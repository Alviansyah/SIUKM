<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 9:06 PM
 */

namespace App\Http\Controllers;

use App\Models\mAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\mPengurus;

class cPengurus extends Controller
{
    public function show($cariTahun)
    {
        if (Auth::user()->id >= 2 && Auth::user()->id <= 4){
            $data['data'] = mPengurus::join('anggotaukm', 'pengurus.idanggota', '=', 'anggotaukm.idanggota')->select('pengurus.*', 'anggotaukm.*')->get();
            return view('Pengurus.pengurus',$data);
        }elseif (Auth::user()->id == 1){
            $data['data'] = mPengurus::join('anggotaukm', 'pengurus.idanggota', '=', 'anggotaukm.idanggota')->select('pengurus.*', 'anggotaukm.*')->get();
            return view('KetuaPSSI.pengurus',$data);
        }elseif (Auth::user()->id >= 5 && Auth::user()->id <= 10){
            $data['data'] = mPengurus::join('anggotaukm', 'pengurus.idanggota', '=', 'anggotaukm.idanggota')->select('pengurus.*', 'anggotaukm.*')->where('pengurus.idukm', Auth::user()->idukm)->get();
            return view('Pengurus.pengurus',$data);
        }else{
            $data['data'] = mPengurus::where('idukm',Auth::user()->idukm)->where('periodepelantikan',$cariTahun)->get();
            return view('Anggota.pengurus',$data);
        }
        
    }

    public function form()
    {
        $data['anggotas'] = mAnggota::where('idukm',Auth::user()->idukm)->get();
        return view('Pengurus.formPengurus',$data);
    }

    public function add(Request $request,$idAnggota){
        $val = Validator::make(
            $request->all(), [
                "jabatan$idAnggota" => 'required']
        );

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }
        $tahun = getdate();
        $pengurus = new mPengurus();
        $pengurus->idAnggota = $idAnggota;
        $pengurus->periodepelantikan = intval($tahun['year']);
        $pengurus->periodeakhir = intval($tahun['year'])+1;
        $pengurus->idukm = Auth::user()->idukm;
        $pengurus->jabatan = $request->input("jabatan$idAnggota");
        $pengurus->save();
        $request->session()->flash('message', 'Jabatan Ditambah');
        return back();
    }

    public function update(Request $request,$idPengurus){
        $val = Validator::make(
            $request->all(), [
                "jabatan$idPengurus" => 'required']
        );

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }
        $pengurus = mPengurus::find($idPengurus);
        $pengurus->jabatan = $request->input("jabatan$idPengurus");
        $pengurus->update();
        $request->session()->flash('message', 'Jabatan Dirubah');
        return back();
    }

    public function delete(Request $request,$idPengurus){
        $pengurus = mPengurus::find($idPengurus);

        $pengurus->delete();
        $request->session()->flash('message', 'Pengurus Dihapus ');
        return back();
    }
}