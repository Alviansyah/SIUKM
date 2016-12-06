<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/24/2016
 * Time: 11:57 AM
 */

namespace App\Http\Controllers;


use App\Models\mAnggota;
use App\Models\mSurat;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class cSurat extends Controller
{
    public function show($tipe)
    {
        $data['surats'] = mSurat::where('tipeSurat',$tipe)->get();
        if (Auth::user()->id == 4){
            return view("BEM.surat$tipe",$data);
        }elseif (Auth::user()->id == 2){
            return view("PD3.surat$tipe",$data);
        }elseif (Auth::user()->id == 3){
            return view("Kemahasiswaan.surat$tipe",$data);
        } elseif (Auth::user()->id >= 5 && Auth::user()->id <= 10){
            $data['surats'] = mSurat::where('idukm',Auth::user()->idukm)->where('tipeSurat',$tipe)->get();
            return view("Pengurus.surat$tipe",$data);
        }
        
 }
    public function form($tipe){
    return view("Pengurus.formS$tipe");
}

    public function add(Request $request, $tipe)
    {
        $val = Validator::make(
            $request->all(), [
                "jenis" => 'required',
                "nomor" => 'required|numeric|min:1',
                "hal" => 'required',
                "nama" => 'required',
                "waktu" => 'required',
                "tempat" => 'required',
                "tujuan" => 'required',
                "doc" => 'required',
            ]
        );

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }

        $surat = new mSurat();
        $surat->namaKegiatan = $request->input("nama");
        $surat->jenisSurat = $request->input("jenis");
        $surat->noSurat = $request->input("nomor");
        $surat->hal = $request->input("hal");
        $surat->waktu = $request->input("waktu");
        $surat->tempat = $request->input("tempat");
        $surat->tujuan = $request->input("tujuan");
        $surat->tipeSurat = $tipe;
        $surat->idukm = Auth::user()->idukm;
        if($tipe == 'Keluar'){
            $surat->validasiBEM = 0;
            $surat->validasiPD3 = 0;
        }

        $surat->file = $request->file('doc')->getFilename();
        $surat->mime = $request->file('doc')->getClientOriginalExtension();

        $request->file('doc')->move('dokumenSurat');
        $surat->save();
        $request->session()->flash('message', 'Surat Ditambah');
        return redirect('/surat/'.$tipe);
    }

    public function edit($tipe, $id){
        $data['surat'] = mSurat::find($id);
        return view("Pengurus.formS$tipe",$data);
    }

    public function update(Request $request, $tipe, $id)
    {
        $surat = mSurat::find($id);
        if ($surat->file == $request->input("doc2")) {
            $val = Validator::make(
                $request->all(), [
                    "jenis" => 'required',
                    "nomor" => 'required|numeric|min:1',
                    "hal" => 'required',
                    "nama" => 'required',
                    "waktu" => 'required',
                    "tempat" => 'required',
                    "tujuan" => 'required',
                ]
            );
        }else{
            $val = Validator::make(
                $request->all(), [
                    "jenis" => 'required',
                    "nomor" => 'required|numeric|min:1',
                    "hal" => 'required',
                    "nama" => 'required',
                    "waktu" => 'required',
                    "tempat" => 'required',
                    "tujuan" => 'required',
                    "doc" => 'required',
                ]
            );
        }
        
        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }
        $surat->namaKegiatan = $request->input("nama");
        $surat->jenisSurat = $request->input("jenis");
        $surat->noSurat = $request->input("nomor");
        $surat->hal = $request->input("hal");
        $surat->waktu = $request->input("waktu");
        $surat->tempat = $request->input("tempat");
        $surat->tujuan = $request->input("tujuan");
        $surat->tipeSurat = $tipe;
        $surat->idukm = Auth::user()->idukm;
        if ($surat->file != $request->input("doc2")) {
            $surat->file = $request->file('doc')->getFilename();
            $surat->mime = $request->file('doc')->getClientOriginalExtension();
            $request->file('doc')->move('dokumenSurat');
        }
        $surat->update();

        $request->session()->flash('message', 'Surat Diubah');
        return redirect('/surat/'.$tipe);
    }

    public function detail($tipe, $id){
        $data['surat'] = mSurat::find($id);
        if (Auth::user()->id == 2){
            return view("PD3.detailS$tipe",$data);
        }elseif (Auth::user()->id == 4){
            return view("BEM.detailS$tipe",$data);
        }elseif (Auth::user()->id == 3){
            return view("Kemahasiswaan.detailS$tipe",$data);
        } elseif (Auth::user()->id >= 5 && Auth::user()->id <= 10){
            return view("Pengurus.detailS$tipe",$data);
        }

    }

    public function download($id)
    {
        $surat = mSurat::find($id);
        $file= public_path(). "/dokumenSurat/$surat->file";

        $headers = array(
            'Content-Type: application/'.$surat->mime,
        );
        return Response::download($file, "$surat->file.$surat->mime", $headers);
    }
    public function validasiBEM(Request $request,$id)
    {
        $surat = mSurat::find($id);
        $surat->validasiBEM = 1;
        $surat->update();
        $request->session()->flash('message', 'Surat Keluar Divalidasi');
        return redirect('/surat/Keluar');
    }

    public function batalBEM(Request $request,$id)
    {
        $surat = mSurat::find($id);
        $surat->validasiBEM = 0;
        $surat->update();
        $request->session()->flash('message', 'Surat Keluar Belum Divalidasi');
        return redirect('/surat/Keluar');
    }

    public function validasiPD3(Request $request,$id)
    {
        $surat = mSurat::find($id);
        $surat->validasiPD3 = 1;
        $surat->update();
        $request->session()->flash('message', 'Surat Keluar Divalidasi');
        return redirect('/surat/Keluar');
    }

    public function batalPD3(Request $request,$id)
    {
        $surat = mSurat::find($id);
        $surat->validasiPD3 = 0;
        $surat->update();
        $request->session()->flash('message', 'Surat Keluar Belum Divalidasi');
        return redirect('/surat/Keluar');
    }
}