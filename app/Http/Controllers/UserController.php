<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Approval;
use App\Models\Instruction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registration(){
        return view('user.registration');
    }

    public function registration_check(Request $request){
        $request->validate([
            'login' => 'required|min:3|max:30|unique:App\Models\User,login',
            'password1' => 'required|min:3|max:30',
            'password2' => 'required|min:3|max:30|same:password1',
            'email' => 'required|min:3|unique:App\Models\User,email',
            'avatar' => ''
        ]);

        $user = new User();
        $user->login = $request->input('login');
        $user->password = Hash::make($request->input('password1'));
        $user->email = $request->input('email');

        $user->blockstatusid = 1;
        $user->roleid = 1; 

        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('images/avatars','public');
            $user->avatar = $path;
        }
        else $user->avatar = 'images/avatars/default.png';

        $user->save();
    
        return view('user.registration')->with('success','New user was added!');
    }

    public function login(Request $request){
        $user = new User();

        $result = $user->where('login','=',$request->input('login'))->get();
        if(count($result) != 0){
            if(Hash::check($request->input('password1'),$result[0]->password)){
                session(['ruser' => $request->input('login')]);
                session(['avatar' => $result[0]->avatar]);
                if($result[0]->roleid == 2) session(['radmin' => $request->input('login')]);
            }
            else return view('home.home',['error' => 'Password is wrong']);
        }
        else{
            return view('home.home',['error' => 'There is not such user']);
        }
        return view('home.home');
    }

    public function unlogin(){
        if(session()->has('ruser')){
            session()->forget('ruser');
            session()->forget('radmin');
            session()->forget('avatar');
        }
        return view('home.home');
    }

    private function getStatuses(){
        return (new Approval())->all();
    }

    public function profile(){
        $data = [];
        $users = (new User)->where('login','=',session('ruser'))->get();
        if(count($users) == 0)
            return view('home.home');
        $data['blockstatusid'] = $users[0]->blockstatusid;
        $data['statuses'] = $this->getStatuses();
        return view('user.profile',$data);
    }
    
    public function changeAvatar(){
        return view('modalwindows.user.modalwindow_change_avatar');
    }

    public function changeAvatar_check(Request $request){
        $user = new User();
        if($request->hasFile('avatar')){
            $old_path = $user->where('login','=',session('ruser'))->get()[0]->avatar;
            Storage::delete('app/public/'.$old_path);
            $path = $request->file('avatar')->store('images/avatars','public');
            $user->where('login','=',session('ruser'))->update(['avatar' => $path]);
            session(['avatar' => $path]);
        }
        else return view('user.profile')->with('error','You have not choose the file')->with('statuses',$this->getStatuses());

        return view('user.profile')->with('success','Avatar has been changed!')->with('statuses',$this->getStatuses());
    }

    public function userPage(Request $request){
        $user = (new User())->where('id','=',$request->id)->get()[0];
        $instructions = (new Instruction())->where('userid','=',$user->id)->get();

        foreach($instructions as $e){
            $e['user'] = $user->login;
            $e['userid'] = $user->id;
        }

        $data = [];
        $data['instructions'] = $instructions;
        $data['login'] = $user->login;
        $data['avatar'] = $user->avatar;
        $data['userid'] = $user->id;
        $data['blockstatusid'] = $user->blockstatusid;

        return view('user.user_page',$data);
    }

    public function blockUser(Request $request){
        $user = (new User())->where('id','=',$request->userid)->update(['blockstatusid' => '2']);
        return 1;
    }

    public function unblockUser(Request $request){
        $user = (new User())->where('id','=',$request->userid)->update(['blockstatusid' => '1']);
        return 1;
    }

    public function getUsers(Request $request){
        $users = (new User)->all();
        $users_data = [];

        foreach ($users as $user) {
            if(strripos($user->login,$request->login) !== false)
                $users_data[] = ['id' =>$user->id,'login' => $user->login, 'avatar' => $user->avatar];
        }
        
        return view('user.display_users',['users' => $users_data]);
    }
}
