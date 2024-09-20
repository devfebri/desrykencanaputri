<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\FotoLokasi;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index(){
        $data=Permohonan::orderBy('id','desc')->get();
        return view('permohonan.index',compact('data'));
    }

    public function tambah(Request $request){
        // dd($request->file('foto_lokasi'));
        $data=new Permohonan;
        $data->nama=$request->nama;
        $data->pekerjaan=$request->pekerjaan;
        $data->nohp=$request->nohp;
        $data->alamat=$request->alamat;
        $data->keterangan=$request->keterangan;
        $data->jenis=$request->jenis;
        $data->status='Proses Dokumen';
        $data->save();
        if ($request->has('foto_lokasi')) {
            $datafoto = $request->file('foto_lokasi');
            foreach ($datafoto as $row) {
                $foto_lokasi = new FotoLokasi();
                $filename = $row->getClientOriginalName() . '-' . time() . '.' . $row->extension();
                $row->move(public_path() . '/storage/foto_lokasi/' . $data->id, $filename);
                $foto_lokasi->permohonan_id = $data->id;
                $foto_lokasi->foto = $filename;
                $foto_lokasi->save();
            }
        }

        if ($request->has('dokumen')) {
            $datadokumen = $request->file('dokumen');
            foreach ($datadokumen as $row) {
                $dokumen = new Dokumen();
                $filename1 = $row->getClientOriginalName() . '-' . time() . '.' . $row->extension();
                $row->move(public_path() . '/storage/dokumen/' . $data->id, $filename1);
                $dokumen->permohonan_id = $data->id;
                $dokumen->dokumen = $filename1;
                $dokumen->save();
            }
        }

        return redirect(route('informasi'))->with('berhasil', 'Data berhasil dibuat');
    }

    public function delete($id){
        $data=Permohonan::find($id);
        $fotolokasi = FotoLokasi::where('permohonan_id', $id);
        foreach ($fotolokasi->get() as $row) {
            $dauthor = $data->first()->username;
            $dportfolio = $row->portfolio;
            $image = 'public/foto_lokasi/' . $dauthor . '/' . $dportfolio;
            // dd(Storage::exists($image));
            if (Storage::exists($image)) {

                Storage::delete($image);
            }
        }
    }

    public function detail($id){
        // dd($id);
        $data=Permohonan::find($id);
        $foto_lokasi=FotoLokasi::where('permohonan_id',$id)->get();
        $dokumen=Dokumen::where('permohonan_id',$id)->get();
        return view('permohonan.open',compact('data','foto_lokasi','dokumen'));
    }
}
