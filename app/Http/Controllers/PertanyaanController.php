<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Mindset;
use App\Models\Soal;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function mindset(Request $request){
        $data = Mindset::all();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<a href="' . route('admin_openmindset', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                $button .= '<a href="#" disabled class="tabledit-edit-button btn btn-sm btn-warning edit-post" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>';

                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . ' disabled style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })->addColumn('jml_indikator', function ($f) {
                    $button  = Indikator::where('mindset_id',$f->id)->count();
                    return $button;
                })
                ->rawColumns(['action', 'jml_indikator'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('pertanyaan.mindset');
    }

    public function tambahmindset(Request $request){
        $data=new Mindset;
        $data->nama_mindset=$request->mindset;
        $data->save();
        return response()->json($data);
    }

    public function openmindset($id,Request $request){
        $mindset=Mindset::find($id);
        $data=Indikator::where('mindset_id',$id)->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';

                    $button .= '<a href="' . route('admin_soal', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<a href="#" disabled class="tabledit-edit-button btn btn-sm btn-warning edit-post" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })->addColumn('jml_soal', function ($f) {
                    $button  = Soal::where('indikator_id',$f->id)->count();
                    return $button;
                })
                ->rawColumns(['action', 'jml_indikator'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('pertanyaan.indikator',compact('data','id', 'mindset'));
    }

    public function deleteindikator($id){
        $data=Indikator::find($id);
        $data->delete();
        return response()->json($data);
    }

    public function tambahindikator (Request $request) {
        $data=new Indikator;
        $data->mindset_id=$request->mindset_id;
        $data->nama_indikator=$request->indikator;
        $data->save();
        return response()->json($data);
    }

    public function soal ($id,Request $request){
        $indikator=Indikator::find($id);
        $data = Soal::where('indikator_id', $id)->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    $button .= '<a href="#" disabled class="tabledit-edit-button btn btn-sm btn-warning edit-post" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id=' . $f->id . '  style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('pertanyaan.soal',compact('id','indikator'));

    }

    public function tambahSoal(Request $request)
    {
        $data = new Soal();
        $data->indikator_id = $request->indikator_id;
        $data->soal = $request->soal;
        $data->save();
        return response()->json($data);
    }

    public function deletesoal($id)
    {
        $data = Soal::find($id);
        $data->delete();
        return response()->json($data);
    }






}
