<?php

namespace App\Http\Controllers;

use App\Models\Serambi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Profile;

class SerambiController extends Controller
{
    public function index(){
        $data = Serambi :: orderBy('id', 'DESC')->get();
        return view('serambi.serambiv',['data'=>$data]); 
        
        

        // $date = Carbon::now();
        // $day = $date->format('l');
        // if($day == 'Tuesday'){
        //     $data = Serambi :: where('jenis','=','1')->where('status','=','0')->first();
            
        //     $data = Serambi :: findorFail($data->id);
        //     $data->status  = 1;
        //     $data->save();
    
        //     $image = 'https://bbpom-makassar.com'.$data->image;
            
        //     $phone = Profile::get(['id','telpon']);
        //     foreach($phone as $item){
        //          // sendImage($item->telpon,$image,$data->caption);
        //     }
        // }
        // if($day == 'thursday'){
        //     $data = Serambi :: where('jenis','=','2')->where('status','=','0')->first();
            
        //     $data = Serambi :: findorFail($data->id);
        //     $data->status  = 1;
        //     $data->save();
    
        //     $image = 'https://bbpom-makassar.com'.$data->image;
            
        //     $phone = Profile::get(['id','telpon']);
        //     foreach($phone as $item){
        //          // sendImage($item->telpon,$image,$data->caption);
        //     }
        // }
        
        
    }
    public function form(){
        return view('serambi.serambii'); 
    }
    public function store(Request $req){
        $req->validate([
            'caption'=>'required',
            'image'=>'required'
        ]);
        $serambi = new Serambi();
        $serambi-> caption = $req->caption;

        if($req->image!= ''){        
            $path = public_path().'/storage/serambi/';
            //upload new file
            $file1 = $req->image;
            $filename1 = "/storage/serambi/".time().$file1->getClientOriginalName();
            $file1->move($path, $filename1);
            $serambi->image = $filename1;
        }

        $serambi->jenis = $req->jenis;
        $status = $serambi->save();
        
        session () ->flash('success','Data berhasil disimpan');
        return $this->index();

    }
    public function edit($id){
        $data = Serambi :: where('id',$id)->first();
        return view('serambi.serambie',['data'=>$data]);
    }
    public function update(Request $req, $id){
        $req->validate([
            'image'=>'required|mimes:jpg,jpeg,png',
            'caption'=>'required'
        ]);
        
        $data = Serambi :: findorFail($id);
        $data->caption  = $req->caption;

        if($req->image != ''){        
            $path = public_path().'/storage/serambi/';

            //code for remove old file
            if($data->image != ''  && $data->image != null ){
            $file_old = $data->image;
            unlink(public_path().$file_old);
            }

                //upload new file
                $file1 = $req->image;
                $filename1 = "/storage/serambi/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $data->image         = $filename1;

        }
        $data->jenis    = $req->jenis;
        $data->save();
        session()->flash('success','Data berhasil diupdate');
        return $this->index();
    }
    public function delete($id){
        $data = Serambi :: findorFail($id);
        $data->delete();
        if($data){
            if($data->image && file_exists(public_path().$data->image)){
                unlink(public_path().$data->image);
            }
        }
        session()->flash('success','Data berhasil dihapus');
        return $this->index();
    }
    public function send($id){
        $data = Serambi :: where('id',$id)->first();

        $curl = curl_init();
        $token = "a4q0sqdPyCqFTpcuOxJz01p8esMPo8I9anLeiq3W4LlIdBoZygmHVDhr1P64QRix";
        $data = [
        'phone' => '081363177720',
        'image' => 'https://bbpom-makassar.com'.$data->image,
        'caption' => $data->caption,
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL,  "https://pati.wablas.com/api/send-image");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        
        $result = curl_exec($curl);
        curl_close($curl);

        $data = Serambi :: findorFail($id);
        $data->status  = 2;
        $data->save();
        
        session()->flash('success','Data berhasil dikirim');
        return $this->index();
    }
}
