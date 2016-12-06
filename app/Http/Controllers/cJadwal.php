<?php

namespace App\Http\Controllers;

use App\Models\mProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

class cJadwal extends Controller
{
    public function show(){
    	$data['data'] = mProposal::where('idukm', Auth::user()->idukm)->get();
    	return view('Pengurus.jadwalKegiatan', $data);
    }
}
