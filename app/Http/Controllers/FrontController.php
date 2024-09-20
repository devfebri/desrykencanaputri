<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function pengajuan(){
        return view('pengajuan');
    }
    public function informasi(){
        $data = Permohonan::orderBy('id', 'desc')->get();
        return view('informasi', compact('data'));
    }
}
