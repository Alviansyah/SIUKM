<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\mProposal;
use App\Models\mKategori;

class cProposal extends Controller {

	public function show(){
        $data['data'] = mProposal::join('kategori', 'kegiatan.idkategori', '=', 'kategori.id')->select('kegiatan.*', 'kategori.kategori')->get();
		return view("Pengurus.proposal", $data);
	}

	public function form(){
		return view("Pengurus.formProposal");
	}

    public function detail($id){
        $data['data'] = mProposal::join('kategori', 'kegiatan.idkategori', '=', 'kategori.id')->select('kegiatan.*', 'kategori.kategori')->find($id);
        return view('Pengurus.detailProposal',$data);
    }

	public function edit($id){
		$data['data'] = mProposal::find($id);
		return view("Pengurus.formProposal", $data);
	}

	public function add(Request $request){
		$val = Validator::make(
			$request->all(),
				['namaKegiatan' => 'required',
                 'kategori' => 'required',
				 'tanggal' => 'required',
				 'deskripsi' => 'required',
				 'tempat' => 'required',
				 'namaFile' => 'required',
				 'file' => 'required']);

		 if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
     }

     $data = new mProposal();
     $data->idukm = Auth::user()->idukm;
     $data->namaKegiatan = $request->input("namaKegiatan");
     $data->idkategori = $request->input("kategori");
     $data->tglKegiatan = $request->input("tanggal");
     $data->deskripsi = $request->input("deskripsi");
     $data->tempat = $request->input("tempat");
     $filename = $request->file("file")->getClientOriginalName();
     $data->fileProposal = $filename;
     $data->mime = $request->file("file")->getClientOriginalExtension();
     $request->file("file")->move("dokumenProposal", $filename);
     $data->save();
     $request->session()->flash("message","Proposal kegiatan ditambahkan.");
     return redirect("/proposal");
	}

	public function update(Request $request, $id){
		$data = mProposal::find($id);

        if ($data->fileProposal == $request->input("namaFile")) {
            $val = Validator::make(
            $request->all(),
                ['namaKegiatan' => 'required',
                 'tanggal' => 'required',
                 'deskripsi' => 'required',
                 'tempat' => 'required']);
        } else {
            $val = Validator::make(
            $request->all(),
                ['namaKegiatan' => 'required',
                 'tanggal' => 'required',
                 'deskripsi' => 'required',
                 'tempat' => 'required',
                 'namaFile' => 'required',
                 'file' => 'required']);
        }
		

		if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
     }

    $data->namaKegiatan = $request->input("namaKegiatan");
    $data->tglKegiatan = $request->input("tanggal");
    $data->deskripsi = $request->input("deskripsi");
    $data->tempat = $request->input("tempat");
    if ($data->fileProposal != $request->input("namaFile")) {
    	$filename = $request->file("file")->getClientOriginalName();
        $data->fileProposal = $filename;
    	$data->mime = $request->file("file")->getClientOriginalExtension();
    	$request->file("file")->move("dokumenProposal", $filename);
    }
    $data->save();
    $request->session()->flash("message","Data proposal berhasil diubah.");
    return redirect("/proposal");
	}

	public function download($id){
        $data = mProposal::find($id);
        $file= public_path(). "/dokumenProposal/$data->fileProposal";

        $headers = array(
            'Content-Type: application/$data->mime',
        );

        return Response::download($file, "$data->namaFile.$data->mime", $headers);
    }
}