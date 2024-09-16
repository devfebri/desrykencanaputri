<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (Request $request){
        $data = User::where('role','!=','admin')->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($f) {
                    $button  = '<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                    $button .= '<div class="btn-group btn-group-sm" style="float: none;">';
                    // $button .= '<a href="' . route('admin_user', ['id' => $f->id]) . '" class="tabledit-edit-button btn btn-sm btn-primary edit-post" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button .= '<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id='.$f->id.' disabled style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                    $button .= '</div>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('user.index');
    }

    public function tambah(Request $request){

        // dd($request->all());
        $data= new User();
        $data->name=$request->name;
        $data->username=$request->no_hp;
        $data->no_hp=$request->no_hp;
        $data->role=$request->role;
        $data->email=$request->email;
        $data->password=bcrypt($request->no_hp);
        $data->save();
        return response()->json($data);
    }
}
