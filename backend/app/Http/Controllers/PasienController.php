<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PasienController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pasien = Pasien::with(['kelurahan'])->get();
        return response()->json($pasien);
    }

    public function store(Request $request) {

        $date = Carbon::now()->isoFormat('YYYYMM');
        $registerPasien = new Pasien();
        $registerPasien->nama = $request->input('nama');
        $registerPasien->alamat = $request->input('alamat');
        $registerPasien->tlp = $request->input('tlp');
        $registerPasien->id_kelurahan = $request->input('id_kelurahan');
        $registerPasien->tanggal_lahir = $request->input('tanggal_lahir');
        $registerPasien->jk = $request->input('jk');
        
        if($registerPasien->save()) {
            return response()->json(compact('registerPasien'), 200);
        } else {
            return response()->json(['status' => 'failed'], 400);
        }
    }

    public function edit($id) {
        $updatePasien = Pasien::with('kelurahan')->where(['id' => $id])->get();
        return response()->json($updatePasien[0]);
    }
}
