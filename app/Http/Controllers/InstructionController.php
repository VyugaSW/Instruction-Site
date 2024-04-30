<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplainType;
use App\Models\Instruction;
use App\Models\User;
use App\Models\Approval;
use App\Models\Complain;
use App\Models\InstructionImage;
use Carbon;

class InstructionController extends Controller
{
    public function getWorksByApproval(Request $request){
        $instruction = new Instruction();
        $userid = (new User())->where('login','=',session('ruser'))->get()[0]->id;
        if($request->approvalid != 0)
            $result = $instruction->where('userid','=',$userid)->where('approvalid','=',$request->approvalid)->get();
        else 
            $result = $instruction->where('userid','=',$userid)->get();
        
        foreach($result as $e){
            $e['user'] = $request->userLogin;
            $e['userid'] = $userid;
        }

        $data = ["instructions" => $result]; 
        return view('instruction.instructions_draw_all',$data);
    }

    public function pageInstruction(Request $request){
        $data = [];
        $ins_arr = (new Instruction())->where('id','=',$request->id)->get();
        
        if(count($ins_arr) == 0)
            return view('layouts.app');

        $instruction = $ins_arr[0];
        $user = (new User())->where('id','=',$instruction->userid)->get()[0];

        $data['avatar'] = $user->avatar;
        $data['login'] = $user->login;
        $data['userid'] = $user->id;
        $data['blockstatusid'] = $user->blockstatusid;

        $data['instructionid'] =$instruction->id;
        $data['title'] = $instruction->name;
        $data['description'] = $instruction->description;
        $data['information'] = $instruction->information;
        $data['datePublished'] = $instruction->datePublished;
        $data['imagecover'] = $instruction->imagecover;
        $data['approvalid'] = $instruction->approvalid;

        $data['statuses'] = (new Approval())->all();

        $instructionImages = (new InstructionImage())->where('instructionid','=',$instruction->id)->get();
        $images = [];
        foreach($instructionImages as $image)
            $images[] = $image;
        
        $data['images'] = $images;

        return view('instruction.instruction_page',$data);
    }

    public function changeApproval(Request $request){
        $instruction = new Instruction();
        $instruction->where('id','=',$request->instructionid)->update(['approvalid' => $request->approvalid]);
        return 1;
    }

    public function showImage(Request $request){
        return view('modalwindows.images.modalwindow_image_instruction',['path' => $request->path]);
    }

    public function showDeleteConfimation(){
        return view('modalwindows.confirmations.modalwindow_delete_confirm');
    }

    public function deleteInstruction(Request $request){
        $instruction = new Instruction();
        $instruction->where('id','=',$request->instructionid)->delete();
        return 1;
    }

    public function showSearch(){
        return view('searching.search');
    }

    public function search(Request $request){
        $line = $request->instructionName;
        $inclDescription = boolval($request->inclDescription);
        $inclAuthor = boolval($request->inclAuthor);
        $inclTitle = boolval($request->inclTitle);

        $instructions = (new Instruction())->all();
        $user = new User();

        $flagFound = false;
        $result_instructions = [];
        foreach($instructions as $instruction){
            $user_author = $user->where('id','=',$instruction->userid)->get()[0];
            if(
                (((strripos($instruction->name,$line) !== false && $inclTitle)
                || (strripos($instruction->description,$line) !== false && $inclDescription) 
                || (strripos($user_author->login,$line) !== false && $inclAuthor)) 
                || (!$inclAuthor && !$inclDescription && !$inclTitle))
                && ($instruction->approvalid == $request->approvalid || $request->approvalid == '0'))
                {
                $instruction['user'] = $user_author->login;
                $instruction['userid'] = $user_author->id;
                array_push($result_instructions,$instruction);
                $flagFound = true;
            }
        }
        if (!$flagFound) return '<h3><span style="color:blue">We could not find anything </span></h3>';
        $data = ['instructions' => $result_instructions];
        return view('instruction.instructions_draw_all',$data);
    }

    public function instructionComplains(){
        $data = [];
        $instruction = new Instruction();
        $user = new User();
        $complainTypes = (new ComplainType)->all();
        $complains = (new Complain())->all();
        foreach($complains as $c){
            $type = $complainTypes[(int)($c->typeid)-1];

            $instruction_arr = $instruction->where('id','=',$c->instructionid)->get()[0];
            $instruction_arr['user'] = $user->where('id','=',$instruction_arr->userid)->get()[0]->login;
            $instruction_arr['userid'] = $instruction_arr->userid;

            $data[] = ['userid' => $c->userid, 'userlogin' => $user->where('id','=',$c->userid)->get()[0]->login,'complainid' => $c->id, 'complainType' => $type, 'description' => $c->description,'instruction' => $instruction_arr];
        }

        return view('instruction.instructions_with_complains')->with('complains',$data);
    }

    public function instructionApproving(){
        return view('instruction.instruction_approving');
    }

    public function createInstruction(){
        return view('instruction.create_instruction');
    }

    public function createInstruction_check(Request $request){
        $instruction = new Instruction();
        $instructionImage = new InstructionImage();

        session()->put('name',$request->input('name'));
        session()->put('description',$request->input('description'));
        session()->put('information',$request->input('information'));

        $validation = $request->validate([
            'name' => 'alpha|required|max:128|min:3',
            'description' => 'alpha|required|max:128|min:10',
            'information' => 'alpha|required|min:15|max:2147483640',
            'imagecover' => 'required   ',
            'images' => 'required|array'
        ]);


        $instruction->name = $request->input('name');
        $instruction->description = $request->input('description');
        $instruction->information = $request->input('information');
        $instruction->datePublished = Carbon\Carbon::now()->toDateString();
        $instruction->userid = (new User)->where('login','=',session('ruser'))->get()[0]->id;
        $instruction->approvalid = 2;

        if($request->hasFile('imagecover')){
            $path = $request->file('imagecover')->store('images/instructionsCovers','public');
            $instruction->imagecover = $path;
        }

        $instruction->save();
        $instructionid = $instruction->id;

        $data = [];
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $path = $image->store('images/instructionsImages','public');
                $data[] = ['instructionid' => $instructionid, 'path' => $path];
            }
            $instructionImage->insert($data);
        }
        return view('instruction.create_instruction')->with('success','New instruction was created!');
    }
}
