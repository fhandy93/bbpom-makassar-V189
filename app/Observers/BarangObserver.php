<?php

namespace App\Observers;

use App\Models\Bmnbarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BarangObserver
{
    /**
     * Handle the Bmnbarang "created" event.
     *
     * @param  \App\Models\Bmnbarang  $bmnbarang
     * @return void
     */
    public function created(Bmnbarang $bmnbarang)
    {
        //
    }

    /**
     * Handle the Bmnbarang "updated" event.
     *
     * @param  \App\Models\Bmnbarang  $bmnbarang
     * @return void
     */
    public function updated(Bmnbarang $bmnbarang)
    {
        if ($bmnbarang->isDirty('lokasi')) {
            DB::table('bmn_tracking')->insert([
                'user_id' => Auth::user()->id,
                'lokasi' => $bmnbarang->getOriginal('lokasi'),
                'barang_id' => $bmnbarang->id,
                'kondisi' => $bmnbarang->kondisi,
                'update_by' => 1,
                'created_at' => now(),
            ]);
        }
    }

    /**
     * Handle the Bmnbarang "deleted" event.
     *
     * @param  \App\Models\Bmnbarang  $bmnbarang
     * @return void
     */
    public function deleted(Bmnbarang $bmnbarang)
    {
        //
    }

    /**
     * Handle the Bmnbarang "restored" event.
     *
     * @param  \App\Models\Bmnbarang  $bmnbarang
     * @return void
     */
    public function restored(Bmnbarang $bmnbarang)
    {
        //
    }

    /**
     * Handle the Bmnbarang "force deleted" event.
     *
     * @param  \App\Models\Bmnbarang  $bmnbarang
     * @return void
     */
    public function forceDeleted(Bmnbarang $bmnbarang)
    {
        //
    }
}
