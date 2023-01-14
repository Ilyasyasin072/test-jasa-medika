<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
class KelurahanController extends Controller
{
    public function index() {

        $data = Kelurahan::all();

        return response()->json($data);

    }

    public function indexList(Request $request) {
        $data = Kelurahan::all();
        $array = [];
        foreach($data as $item) {
            $array[] = [
                'id' => $item->id,
                'text' => $item->nama_kelurahan,
                'param1' => $item->nama_kecamatan,
                'param2' => $item->nama_kota,
            ];
        }
        return response()->json($array);
    }

    public function create() {
        return view('kelurahan.create');
    }

    public function store(Request $request) {

        $registerKelurahan = new Kelurahan();
        $registerKelurahan->nama_kelurahan = $request->input('nama_kelurahan');
        $registerKelurahan->nama_kecamatan = $request->input('nama_kecamatan');
        $registerKelurahan->nama_kota = $request->input('nama_kota');
        
        if($registerKelurahan->save()) {
            return response()->json(compact('registerKelurahan'), 200);
        } else {
            return response()->json(['status' => 'failed'], 400);
        }

    }

    public function edit($id) {
        $kelurahan = Kelurahan::where('id', $id)->firstOrFail();
        return response()->json($kelurahan);
    }
    public function update(Request $request, $id) {

        $validate = Validator::make($request->all(),[
            'nama_kelurahan' => 'required',
            'nama_kecamatan' => 'required',
            'nama_kota' => 'required'
        ]);

        if (!$validate->fails()) {
        
            $kelurahan = Kelurahan::where('id', $id)->firstOrFail();
            $kelurahan->nama_kelurahan = $request->nama_kelurahan;
            $kelurahan->nama_kecamatan = $request->nama_kecamatan;
            $kelurahan->nama_kota = $request->nama_kota;
            
            if($kelurahan->save()) {
                return response()->json(['status' => 'success'], 200);
            } else {
                return response()->json(['status' => 'failed'], 400);
            }
        }
        
    }
}
