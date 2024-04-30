<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\User;
use App\Models\ComplainType;

class ComplainController extends Controller
{
    public function showComplains(Request $request){
        $complainType = new ComplainType();
        $data = ['complainTypes' => $complainType->all(), 'instructionid' => $request->instructionid];
        return view('modalwindows.complains.modalwindow_complain',$data);
    }

    public function handleComplain(Request $request){
        $complain = new Complain();

        $complain->instructionid = $request->instructionid;
        $complain->typeid = $request->complainTypeid;
        $complain->userid = (new User)->where('login','=',$request->user_session_login)->get()[0]->id;
        $complain->description = $request->description;

        $complain->save();

        return view('modalwindows.notifications.modalwindow_success')->with('message','Your complain was send!');
    }

    public function complainClear(Request $request){
        $complain = new Complain();
        $complain->where('id','=',$request->complainid)->delete();
        return 1;
    }
}
