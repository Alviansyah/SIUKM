<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 11:40 PM
 */

namespace App\Http\Controllers;


use App\Models\mSPJ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class cSPJ extends Controller
{
    public function show()
    {
        if (Auth::user()->id == 1) {
            $data['data'] = mSPJ::all();
            return view('KetuaPssi.spj',$data);
        } else if (Auth::user()->id == 2) {
            $data['data'] = mSPJ::all();
            return view('PD3.spj',$data);
        } else if (Auth::user()->id == 3) {
            $data['data'] = mSPJ::all();
            return view('kemahasiswaan.spj',$data);
        } else if (Auth::user()->id == 4) {
            $data['data'] = mSPJ::all();
            return view('BEM.spj',$data);
        } else {
            $data['data'] = mSPJ::where('idukm',Auth::user()->idukm)->get();
            return view('Pengurus.spj',$data);
        }
    }

    public function form()
    {
        return view('Pengurus.formSPJ');
    }

    public function edit($id)
    {
        $data['data'] = mSPJ::find($id);
        return view('Pengurus.formSPJ',$data);
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

        $data = new mSPJ();
        $data->idkegiatan = $request->input("idkegiatan");
        $data->idukm = Auth::user()->idukm;
        $data->namaFile = $request->input('docName');
        $data->fileSPJ = $request->file('doc')->getFilename();
        $data->mime = $request->file('doc')->getClientOriginalExtension();
        $data->validasi_keuangan = 0;
        $request->file('doc')->move('dokumenSPJ');
        $data->save();
        $request->session()->flash('message', 'SPJ Ditambahkan.');
        return redirect('/spj');
    }

    public function update(Request $request,$id)
    {
        $data = mSPJ::find($id);
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

        $data->idkegiatan = $request->input("idkegiatan");
        if ($data->fileSPJ != $request->input("doc"))
        {
            $data->namaFile = $request->input('docName');
            $data->fileSPJ = $request->file('doc')->getFilename();
            $data->mime = $request->file('doc')->getClientOriginalExtension();
            $request->file('doc')->move('dokumenSPJ');
        }

        $data->update();
        $request->session()->flash('message', 'Data SPJ diubah.');
        return redirect('/spj');
    }

    public function download($id)
    {
        $data = mSPJ::find($id);
        $file= public_path(). "/dokumenspj/$data->fileSPJ";

        $headers = array(
            'Content-Type: application/'.$data->mime,
        );

        return Response::download($file, "$data->fileSPJ.$data->mime", $headers);
    }

    public function validasiBEM(Request $request,$id)
    {
        $dana = mSPJ::find($id);
        $dana->validasi_BEM = 1;
        $dana->update();
        $request->session()->flash('message', 'SPJ Divalidasi.');
        return redirect('/spj');
    }
}