<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 11:19 PM
 */

namespace App\Http\Controllers;


use App\Models\mADART;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class cADART extends Controller
{
    public function show()
    {
        $data['data'] = mADART::where('idukm',Auth::user()->idukm)->get();
        return view('Pengurus.ad-art',$data);
    }

    public function form()
    {
        return view('Pengurus.formAd-Art');
    }

    public function edit($id)
    {
        $data['data'] = mADART::find($id);
        return view('Pengurus.formAD-Art',$data);
    }

    public function add(Request $request)
    {
        $val = Validator::make(
            $request->all(), [
                "file" => 'required',
            ]
        );

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }
        $data = new mADART();
        $data->idukm = Auth::user()->idukm;
        $data->namaFile = $request->input("fileName");
        $data->fileADART = $request->file("file")->getFilename();
        $data->mime = $request->file('file')->getClientOriginalExtension();
        $data->tahun = date('Y');
        $request->file('file')->move('dokumenADART');
        $data->save();
        $request->session()->flash('message', 'AD/ART Ditambah');
        return redirect('/adart');
    }

    public function update(Request $request,$id)
    {
        $val = Validator::make(
            $request->all(), [
                "file" => 'required',
            ]
        );

        if ($val->fails()) {
            return back()
                ->withErrors($val)
                ->withInput();
        }
        $data = mADART::find($id);
        $data->namaFile = $request->input("fileName");
        $data->fileADART = $request->file("file")->getFilename();
        $data->mime = $request->file("file")->getClientOriginalExtension();
        $request->file('file')->move('dokumenADART');
        $data->update();
        $request->session()->flash('message', 'AD/ART Diubah');
        return redirect('/adart');
    }

    public function download(Request $request, $id){
        $filedata = mADART::find($id);
        $file = public_path() . "/dokumenADART/$filedata->fileADART";

        $headers = array("Conten-Type: application/".$filedata->mime);

        return Response::download($file, "$filedata->fileADART.$filedata->mime", $headers);
    }
    
}