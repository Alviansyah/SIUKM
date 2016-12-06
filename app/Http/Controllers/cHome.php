<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 5/1/2016
 * Time: 1:55 AM
 */

namespace App\Http\Controllers;

use App\Models\mUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class cHome extends Controller
{
    public function user()
    {
        $user = Auth::user();
        return $user;
    }

/*public function coba(){
    for ($i = 1; $i <= 10; $i++){
        $a[$i] = mUser::find($i);
        $a[$i]->password = bcrypt($a[$i]->pass);
        $a[$i]->update();
    }

}*/

    public function dashboard(Request $request)
    {

        if ($this->user()) {

            if ($this->user()->id == 1) {
                return view('KetuaPssi.home');
            } elseif ($this->user()->id == 2){
                return view('PD3.home');
            } elseif ($this->user()->id == 3){
                return view('kemahasiswaan.home');
            } elseif ($this->user()->id == 4) {
                return view('BEM.home');
            }  elseif ($this->user()->id >= 5 && $this->user()->id <= 10) {
                return view('Pengurus.home');
            }
        }else{
            return redirect('/auth/login');
        }
    }
}