<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'kode' => $this->kode,
            'tanggal' => $this->tanggal,
            'nama_sample' => $this->nama_sample,
            'komoditi' => $this->komoditi,
            'asal' => $this->asal,
            'tahap' => $this->tahap,
            'berkas' => $this->berkas,
            'billing' => $this->billing,
            'created_at' => $this->created_at,
            'nama' => $this->nama,
        ];
    }
}