<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\FotoLokasi;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permohonan['status']='success';
        $permohonan['data']=Permohonan::all();
        return response()->json($permohonan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status['status'] = 'success';

        $data = new Permohonan;
        $data->nama = $request->nama;
        $data->pekerjaan = $request->pekerjaan;
        $data->nohp = $request->nohp;
        $data->alamat = $request->alamat;
        $data->keterangan = $request->keterangan;
        $data->jenis = $request->jenis;
        $data->status = 'Proses Dokumen';
        $data->save();
        $status['message'] = "Permohonan created successfully";

        return response()->json($status);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status['status'] = 'success';

        $data =  Permohonan::find($id);
        $data->nama = $request->nama;
        $data->pekerjaan = $request->pekerjaan;
        $data->nohp = $request->nohp;
        $data->alamat = $request->alamat;
        $data->keterangan = $request->keterangan;
        $data->jenis = $request->jenis;
        $data->save();
        $status['message'] = "Permohonan created successfully";

        return response()->json($status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Permohonan::find($id)->delete();
        $pesan='data berhasil dihapus';
        return response()->json($pesan);
    }
}
