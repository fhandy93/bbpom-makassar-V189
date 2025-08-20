<?php

namespace App\Http\Controllers;

use App\Models\Infopomkat;
use App\Models\InfopomLearAnsw;
use App\Models\InfopomLearQuest;
use App\Models\Infopomqna;
use App\Models\InfopomVisitor;
use Exception;
use Illuminate\Http\Request;

class InfopomController extends Controller
{
    public function index(){
        for($i=1;$i<=12;$i++){
            ${"data$i"} = InfopomVisitor :: whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
            ${"count$i"} = ${"data$i"}->count();
        }
        $qna = InfopomLearQuest :: get()->count();
        $faq = Infopomqna :: get()->count();
        $faqk = Infopomkat :: get()->count();
        return view('infopom.index',compact('count1',
                                             'count2',
                                             'count3',
                                             'count4',
                                             'count5',
                                             'count6',
                                             'count7',
                                             'count8',
                                             'count9',
                                             'count10',
                                             'count11',
                                             'count12',
                                             'qna',
                                             'faq',
                                             'faqk'
                                            ));
    }
    public function qnaQuest($komo){
        if($komo == 'pangan' OR $komo == 1){
            $kategori = 1;
        }elseif($komo == 'kosmetik' OR $komo == 2){
            $kategori = 2;
        }elseif($komo == 'ot' OR $komo == 3){
            $kategori = 3;
        }elseif($komo == 'non-pelaku-usaha' OR $komo == 6){
            $kategori = 6;
        }
        $url = '/info-pom/qna/'.$komo;
        session(['parent_url' =>$url]);
        $data = InfopomLearQuest :: where('kategori_id',$kategori)->where('parent_answers_id',0)->orderBy('id', 'DESC')->get(); 
        return view('infopom.daftar-lear-quest',['data'=>$data,'komo'=>$kategori,'answer_id'=>0]);
    }
    public function qnaInp($komo, $id){
        return view('infopom.input-lear-quest',['komo'=>$komo,'parent_id'=>$id]);
    }
    public function qnaStore(Request $req){
        $req->validate([
            "quest" => "required",
        ],[
            "quest" => "Kolom pertanyaan harus diisi",
        ]);
         $data = new InfopomLearQuest();
         $data->kategori_id         = $req->komo;
         $data->questions           = $req->quest;
         $data->detail              = $req->detail;
         if($req->endquest == 'end' ){
            $data->status           = 1;
         }else{
            $data->status           = 0;
         }
         $data->parent_answers_id    = $req->parent;   
         $data->save();

         if($req->parent == 0){
            return redirect()->route('infopom.qna-quest',['komo' => $req->komo])->with('success', 'Data berhasil disimpan');
         }else{
             return redirect()->route('infopom.qna-quest-list',['komo' => $req->komo,'id' => $req->parent])->with('success', 'Data berhasil disimpan');
         }

    }
    public function listJwb($id){
        $info = InfopomLearQuest :: where('id',$id)->first(['id','questions','status','kategori_id']); 
        $data = InfopomLearAnsw :: where('questions_id',$id)->orderBy('id', 'DESC')->get(); 
        return view('infopom.daftar-lear-answ',['data'=>$data,'info'=>$info]);
    }
    public function answInp($id){
        return view('infopom.input-lear-answ',['quest_id'=>$id]);
    }
    public function qnaStoreAnsw(Request $req){
        $req->validate([
            "answer" => "required",
        ],[
            "answer" => "Kolom Jawaban harus diisi",
        ]);
         $data = new InfopomLearAnsw();
         $data->questions_id        = $req->parent;
         $data->answers             = $req->answer;
         $data->detail              = $req->detail;
         $data->save();

          return redirect()->route('infopom.qna-answ',['id'=>$req->parent])->with('success', 'Data berhasil disimpan');
    }
    public function qnaQuestLanjut($komo,$id){
       $data = InfopomLearQuest::where('parent_answers_id', $id)->orderBy('id', 'DESC')->get();
        return view('infopom.daftar-lear-quest', [
            'data' => $data,
            'komo' => $komo,
            'answer_id' => $id
        ]);
    }
    public function deleteQuestion($id)
    {
        $question = InfopomLearQuest::findOrFail($id);

        // 1. Ambil semua jawaban dari pertanyaan ini
        $answers = InfopomLearAnsw::where('questions_id', $question->id)->get();

        foreach ($answers as $answer) {
            // 2. Hapus semua pertanyaan yang menjadikan jawaban ini sebagai parent
            $childQuestions = InfopomLearQuest::where('parent_answers_id', $answer->id)->get();

            foreach ($childQuestions as $childQuestion) {
                // Rekursif: hapus pertanyaan anak (beserta jawaban dan child-child-nya)
                $this->deleteQuestion($childQuestion->id);
            }

            // 3. Hapus jawaban
            $answer->delete();
        }

        // 4. Hapus pertanyaan itu sendiri
        $question->delete();

         if($question-> parent_answers_id == 0){
            return redirect()->route('infopom.qna-quest',['komo' => $question->kategori_id])->with('success', 'Data berhasil dihapus');
         }else{
             return redirect()->route('infopom.qna-quest-list',['komo' => $question->kategori_id,'id' => $question->parent_answers_id])->with('success', 'Data berhasil dihapus');
         }
    }
    public function deleteAnswer($id)
    {
        $answer = InfopomLearAnsw::findOrFail($id);

        // 1. Cari pertanyaan yang menjadikan jawaban ini sebagai parent
        $childQuestions = InfopomLearQuest::where('parent_answers_id', $answer->id)->get();

        foreach ($childQuestions as $childQuestion) {
            // Rekursif: hapus pertanyaan anak
            $this->deleteQuestion($childQuestion->id);
        }

        // 2. Hapus jawaban itu sendiri
        $answer->delete();

        return redirect()->route('infopom.qna-answ',['id'=>$answer->questions_id])->with('success', 'Data berhasil dihapus');
    }
    public function editQnaQuest($id){
        $data = InfopomLearQuest :: where('id',$id)->first();
        return view('infopom.edit-lear-quest',['data'=>$data]);
    }
    public function updateQnaQuest(Request $req, $id){

         $req->validate([
            "quest" => "required",
        ],[
            "quest" => "Kolom pertanyaan harus diisi",
        ]);
         $data = InfopomLearQuest :: findOrFail($id);
         $data->kategori_id         = $req->komo;
         $data->questions           = $req->quest;
         $data->detail              = $req->detail;
         if($req->endquest == 'end' ){
            $data->status           = 1;
         }else{
            $data->status           = 0;
         }
         $data->parent_answers_id    = $req->parent;   
         $data->save();

         if($req->parent == 0){
            return redirect()->route('infopom.qna-quest',['komo' => $req->komo])->with('success', 'Data berhasil diupdate');
         }else{
             return redirect()->route('infopom.qna-quest-list',['komo' => $req->komo,'id' => $req->parent])->with('success', 'Data berhasil diupdate');
         }
    }
    public function editQnaAnsw($id){
        $data = InfopomLearAnsw :: where('id',$id)->first();
        return view('infopom.edit-lear-answ',['data'=>$data]);
    }
    public function updateQnaAnsw(Request $req, $id){
        $req->validate([
            "answer" => "required",
        ],[
            "answer" => "Kolom Jawaban harus diisi",
        ]);
         $data = InfopomLearAnsw :: findOrFail($id);
         $data->questions_id        = $req->parent;
         $data->answers             = $req->answer;
         $data->detail              = $req->detail;
         $data->save();

          return redirect()->route('infopom.qna-answ',['id'=>$req->parent])->with('success', 'Data berhasil diupdate');
    }
    public function faqKat(){
        $data = Infopomkat :: get();
        return view('infopom.daftar-faq-kat',['data'=>$data]);
    }
    public function faq(){
        $data = Infopomqna :: get();
        return view('infopom.daftar-faq',['data'=>$data]);
    }
    public function faqInputkat(){
        return view('infopom.input-faq-kat');
    }
    public function faqInputKatStore(Request $req){
        $req->validate([
            "title" => "required",
            "kat" => "required"
        ],[
            "title" => "Kolom Title harus diisi",
            "kat" => "Kolom Nama Kategori harus diisi",
        ]);
        $data = new Infopomkat();
        $data->title        = $req->title;
        $data->nm_kategori  = $req->kat;
        $data->save();
        return redirect()->route('infopom.faq-kat')->with('success', 'Data berhasil disimpan');
    }
    public function faqEdit($id){
        $data = Infopomkat :: where('id',$id)->first();
        return view('infopom.edit-faq-kat',['data'=>$data]);
    }
    public function faqUpdate(Request $req, $id){
         $req->validate([
            "title" => "required",
            "kat" => "required"
        ],[
            "title" => "Kolom Title harus diisi",
            "kat" => "Kolom Nama Kategori harus diisi",
        ]);
        $data = Infopomkat :: findOrFail($id);
        $data->title        = $req->title;
        $data->nm_kategori  = $req->kat;
        $data->save();
        return redirect()->route('infopom.faq-kat')->with('success', 'Data berhasil diupdate');
    }
    public function delFaqKat($id){
        Infopomkat :: findOrFail($id)->delete();
        Infopomqna :: where('kategori_id',$id)->delete();
        return redirect()->route('infopom.faq-kat')->with('success', 'Data berhasil dihapus');
    }
    public function faqInput(){
        $kat = Infopomkat :: get();
        return view('infopom.input-faq',['kat'=>$kat]);
    }
    public function faqInputStore(Request $req){
        $req->validate([
            "kat" => "required",
            "tanya" => "required",
            "jawab" => "required"
        ],[
            "kat" => "Pilih Kategori terlebih dahulu",
            "tanya" => "Kolom Pertanyaan harus diisi",
            "jawab" => "Kolom Jawaban harus diisi",
        ]);
        try{
            $data = new Infopomqna();
            $data->kategori_id      = $req->kat;
            $data->tanya            = $req->tanya;
            $data->jawab            = $req->jawab;
            $data->save();
            return redirect()->route('infopom.faq')->with('success', 'Data berhasil diinput');
        }catch(Exception $e) {
            return back()->with('unsuccess',  $e->getMessage());
        }
    }
}
