<?php

namespace App\Http\Controllers;

use App\Models\mLPJ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

class cLPJ extends Controller
{
    public function show()
    {
        if (Auth::user()->id == 1) {
            $data['data'] = mLPJ::all();
            return view('KetuaPssi.spj',$data);
        }else if (Auth::user()->id == 2) {
            $data['data'] = mLPJ::all();
            return view('PD3.lpj',$data);
        }else if (Auth::user()->id == 3) {
            $data['data'] = mLPJ::all();
            return view('kemahasiswaan.lpj',$data);
        }else if (Auth::user()->id == 4) {
            $data['data'] = mLPJ::all();
            return view('BEM.lpj',$data);
        }else {
            $data['data'] = mLPJ::where('idukm',Auth::user()->idukm)->get();
            return view('Pengurus.lpj',$data);
        }
    }

    public function form()
    {
        return view('Pengurus.formLPJ');
    }

    public function edit($id)
    {
        $data['data'] = mLPJ::find($id);
        return view('Pengurus.formLPJ',$data);
    }

    public function add(Request $request)
    {
        $val = Validator::make(
            $request->all(), [
                "doc" => 'required',
            ]
        );

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }

        $data = new mLPJ();
        $data->idukm = $request->input("idspj");
        $data->idukm = Auth::user()->idukm;
        $data->namaFile = $request->input('docName');
        $data->fileLPJ = $request->file('doc')->getFilename();
        $data->mime = $request->file('doc')->getClientOriginalExtension();
        $data->validasi_BEM = 0;
        $data->validasi_PD3 = 0;
        $request->file('doc')->move('dokumenLPJ');
        $data->save();
        $request->session()->flash('message', 'LPJ Ditambahkan.');
        return redirect('/lpj');
    }

    public function update(Request $request,$id)
    {
        $data = mLPJ::find($id);
            $val = Validator::make(
                $request->all(), [
                    "doc" => 'required',
                ]
            );
        
        
        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }

        if ($data->fileLPJ != $request->input("doc"))
        {
            $data->namaFile = $request->input('docName');
            $data->fileLPJ = $request->file('doc')->getFilename();
            $data->mime = $request->file('doc')->getClientOriginalExtension();
            $request->file('doc')->move('dokumenLPJ');
        }

        $data->update();
        $request->session()->flash('message', 'Data LPJ diubah.');
        return redirect('/lpj');
    }

    public function download($id)
    {
        $data = mLPJ::find($id);
        $file= public_path(). "/dokumenlpj/$data->fileLPJ";

        $headers = array(
            'Content-Type: application/'.$data->mime,
        );

        return Response::download($file, "$data->fileLPJ.$data->mime", $headers);
    }

    public function validasiBEM(Request $request,$id)
    {
        $dana = mLPJ::find($id);
        $dana->validasi_BEM = 1;
        $dana->update();
        $request->session()->flash('message', 'LPJ Divalidasi');
        return redirect('/lpj');
    }
}
