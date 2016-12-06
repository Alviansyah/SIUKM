<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 11:40 PM
 */

namespace App\Http\Controllers;


use App\Models\mDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class cDana extends Controller
{
    public function show()
    {
        $tahun = getdate();
        for($i=2016; $i <= intval($tahun['year']); $i++){
            $data['tts'][] = $i;
        }
      
        $data['danas'] = mDana::all();
        if (Auth::user()->id == 4){
            return view('BEM.dana',$data);
        }elseif (Auth::user()->id == 2){
            return view('PD3.dana',$data);
        }elseif (Auth::user()->id == 3){
            return view('Kemahasiswaan.dana',$data);
        }elseif (Auth::user()->id == 1){
            return view('KetuaPssi.dana',$data);
        } elseif (Auth::user()->id >= 5 && Auth::user()->id <= 10){
            $data['danas'] = mDana::where('idukm',Auth::user()->idukm)->get();
            return view('Pengurus.dana',$data);
        }

    }
    public function form()
    {
        return view('Pengurus.formDana');
    }
    public function edit($id)
    {
        $data['dana'] = mDana::find($id);
        return view('Pengurus.formDana',$data);
    }
    public function add(Request $request)
    {
        $val = Validator::make(
            $request->all(), [
                "nama" => 'required',
                "doc" => 'required',
            ]
        );

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }

        $dana = new mDana();
        $dana->namakegiatan = $request->input("nama");
        $dana->anggarandanakegiatan = $request->file('doc')->getFilename();
        $dana->mime = $request->file('doc')->getClientOriginalExtension();
        $dana->idukm = Auth::user()->idukm;
        $dana->validasi_BEM = 0;
        $dana->validasi_PD3 = 0;
        $request->file('doc')->move('dokumenDana');
        $dana->save();
        $request->session()->flash('message', 'Anggaran Dana Ditambah');
        return redirect('/dana');
    }
    public function update(Request $request,$id)
    {

        $dana = mDana::find($id);
        if ($dana->anggarandanakegiatan == $request->input("doc2")) {
            $val = Validator::make(
                $request->all(), [
                    "nama" => 'required',
                ]
            );
        }else{
            $val = Validator::make(
                $request->all(), [
                    "nama" => 'required',
                    "doc" => 'required',
                ]
            );
        }
        
        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }

        $dana->namakegiatan = $request->input("nama");
        if ($dana->anggarandanakegiatan != $request->input("doc2")) {
            $dana->anggarandanakegiatan = $request->file('doc')->getFilename();
            $dana->mime = $request->file('doc')->getClientOriginalExtension();
            $request->file('doc')->move('dokumenDana');
        }
        $dana->update();
        $request->session()->flash('message', 'Anggaran Dana Dirubah');
        return redirect('/dana');
    }

    public function download($id)
    {
        $dana = mDana::find($id);
        $file= public_path(). "/dokumenDana/$dana->anggarandanakegiatan";

        $headers = array(
            'Content-Type: application/'.$dana->mime,
        );

        return Response::download($file, "$dana->namakegiatan.$dana->mime", $headers);
    }

    public function validasiBEM(Request $request,$id)
    {
        $dana = mDana::find($id);
        $dana->validasi_BEM = 1;
        $dana->update();
        $request->session()->flash('message', 'Anggaran Dana Divalidasi');
        return redirect('/dana');
    }

    public function batalBEM(Request $request,$id)
    {
        $dana = mDana::find($id);
        $dana->validasi_BEM = 0;
        $dana->update();
        $request->session()->flash('message', 'Anggaran Dana Belum Divalidasi');
        return redirect('/dana');
    }

    public function validasiPD3(Request $request,$id)
    {
        $dana = mDana::find($id);
        $dana->validasi_PD3 = 1;
        $dana->update();
        $request->session()->flash('message', 'Anggaran Dana Divalidasi');
        return redirect('/dana');
    }

    public function batalPD3(Request $request,$id)
    {
        $dana = mDana::find($id);
        $dana->validasi_PD3 = 0;
        $dana->update();
        $request->session()->flash('message', 'Anggaran Dana Belum Divalidasi');
        return redirect('/dana');
    }
}