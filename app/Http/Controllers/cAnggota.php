<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 1:06 PM
 */

namespace App\Http\Controllers;


use App\Models\mUkm;
use App\Models\mUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\mAnggota;

class cAnggota extends Controller
{
    public function show(){
        $data['anggotas'] = mAnggota::all();
        if (Auth::user()->id >= 2 && Auth::user()->id <= 4){
            return view('anggo',$data);
        }elseif (Auth::user()->id == 1){
            return view('KetuaPssi.anggo',$data);
        }elseif (Auth::user()->id >= 5 && Auth::user()->id <= 10){
            $data['anggotas'] = mAnggota::where('idukm',Auth::user()->idukm)->get();
            return view('Pengurus.anggo',$data);
        }else{
            $data['anggotas'] = mAnggota::where('idukm',Auth::user()->idukm)->get();
            return view('Anggota.anggo',$data);
        }

    }
    public function form(){
        $ukm= explode (" ",Auth::user()->username);
        if (empty($ukm[1])){
            $namaukm = $ukm[0];
        }else{
            $namaukm = $ukm[1];
        }
        $data['namaukm'] = $namaukm;
        return view('Pengurus.formAnggota',$data);
    }
    public function add(Request $request){
        
        $val = Validator::make(
            $request->all(), ['nim' => 'required',
                'nama' => 'required',
                'tl1' => 'required',
                'tl2' => 'required',
                'alamat' => 'required',
                'notlp' => 'required|numeric|min:1',
                'email' => 'required|email|max:255|unique:anggotaukm',
                'divisi' => 'required',
                'pass' => 'required',]
        );

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }


        $ukm= explode (" ",Auth::user()->username);
        if (empty($ukm[1])){
            $namaukm = $ukm[0];
        }else{
            $namaukm = $ukm[1];
        }
        $use = new mUser();
        $use->username = $namaukm.'@'.$request->input('nim');
        $use->pass = $request->input('pass');
        $use->password = bcrypt($request->input('pass'));
        $use->idukm = Auth::user()->idukm;
        $use->save();

        $angg = new mAnggota();
        $angg->username = $namaukm.'@'.$request->input('nim');
        $angg->nim = $request->input('nim');
        $angg->nama = $request->input('nama');
        $angg->tempatlahir = $request->input('tl1');
        $angg->tanggallahir = $request->input('tl2');
        $angg->alamat = $request->input('alamat');
        $angg->notlp = $request->input('notlp');
        $angg->email = $request->input('email');
        $angg->divisi = $request->input('divisi');
        $angg->idukm = Auth::user()->idukm;
        $angg->save();

            $request->session()->flash('message', 'Anggota Ditambahkan');
            return redirect('/anggota');
    }
    public function detail($id){
        $data['anggota'] = mAnggota::find($id);
        if (Auth::user()->id >= 2 && Auth::user()->id <= 4){
            return view('detailAnggota',$data);
        }elseif (Auth::user()->id == 1){
            return view('KetuaPssi.detailAnggota',$data);
        }elseif (Auth::user()->id >= 5 && Auth::user()->id <= 10){
            return view('Pengurus.detailAnggota',$data);
        }else{
            return view('Anggota.detailAnggota',$data);
        }

    }
    public function edit($id){
        $ukm= explode (" ",Auth::user()->username);
        if (empty($ukm[1])){
            $namaukm = $ukm[0];
        }else{
            $namaukm = $ukm[1];
        }
        $data['namaukm'] = $namaukm;
        $data['anggota'] = mAnggota::find($id);
        return view('Pengurus.formAnggota',$data);
    }
    
    public function update(Request $request, $id){
        $angg = mAnggota::find($id);
        if($angg->email == $request->input('email')){
            $val = Validator::make(
                $request->all(), ['nim' => 'required',
                    'nama' => 'required',
                    'tl1' => 'required',
                    'tl2' => 'required',
                    'alamat' => 'required',
                    'notlp' => 'required|numeric|min:1',
                    'email' => 'required|email|max:255',
                    'divisi' => 'required',
                    'pass' => 'required',]
            );
        }else{
            $val = Validator::make(
                $request->all(), ['nim' => 'required',
                    'nama' => 'required',
                    'ttl' => 'required',
                    'alamat' => 'required',
                    'notlp' => 'required|numeric|min:1',
                    'email' => 'required|email|max:255|unique:anggotaukm',
                    'divisi' => 'required',
                    'pass' => 'required',]
            );
        }

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }

        $ukm= explode (" ",Auth::user()->username);
        if (empty($ukm[1])){
            $namaukm = $ukm[0];
        }else{
            $namaukm = $ukm[1];
        }
        $use = mUser::where('username',$angg->username)->first();
        $use->username = $namaukm.'@'.$request->input('nim');
        $use->pass = $request->input('pass');
        $use->password = bcrypt($request->input('pass'));
        $use->idukm = Auth::user()->idukm;
        $use->update();

        $angg->username = $namaukm.'@'.$request->input('nim');
        $angg->nim = $request->input('nim');
        $angg->nim = $request->input('nim');
        $angg->nama = $request->input('nama');
        $angg->tempatlahir = $request->input('tl1');
        $angg->tanggallahir = $request->input('tl2');
        $angg->alamat = $request->input('alamat');
        $angg->notlp = $request->input('notlp');
        $angg->email = $request->input('email');
        $angg->divisi = $request->input('divisi');
        $angg->update();

        $request->session()->flash('message', 'Anggota Diubah');
        return redirect('/anggota');
    }
}