<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request){
        $data = Kelas::all();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<a href="' . route('admin_kelasopen', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . ' disabled style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kelas.index');
    }

    public function tambah(Request $request)
    {
        // dd($request->all());
        $data = new Kelas();
        $data->nama_kelas = $request->nama_kelas;
        $data->save();
        return response()->json($data);
    }

    public function open($id){
        $id=$id;
        $materi = Materi::where('kelas_id',$id)->get();
        $data   = Kelas::find($id);
        $mahasiswa=User::where('role','mahasiswa')->get();
        return view('kelas.open',compact('data','id','materi', 'mahasiswa'));
    }
}
