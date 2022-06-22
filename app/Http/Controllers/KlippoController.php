<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\klippos;
use Illuminate\Support\Str;
class KlippoController extends Controller
{
    //

    public function index(){
        return view('mainpages.index');
    }

    public function create(Request $request){
        if(empty($request->file) && empty($request->content)){
                $msg="Kinldy Fill in some details in the spaces provided";
                return view("mainpages.index",['emptymsg'=>$msg]);
        }else{

            $post= new Klippos;
            $post->information=$request->content;
            $otp=rand(0,9).Str::random(3);
            $post->otp=$otp;
            if($request->file('file')){
                    $request->validate(
                        [
                            'file'=>'mimes:pdf,jpeg,png,jpg|file'
                        ]
                        );
                    $image=$request->file('file')->store('documents');
                    $post->file=$image;
                    // dd($image);
                };
            $post->save();
            $msg="Kindly Share The Code To The Recipient To Retrieve Your Content!";
            return view('mainpages.index',['otp'=>$otp,'msg'=>$msg]);
        }
    }

    public function otp($otp=2){
        if($otp==2){
           $errorotp="Please Fill in The required space";
           return view('mainpages.index',['errormsg'=>$errorotp]);
    }else{

               $details= Klippos::where('otp',$otp)->first();
               $information=$details->information;
               $file=$details->file;
               $msgret="Kindly Download The Attached File";
            //    dd($file);
               return view('mainpages.index',['info'=>$information,'file'=>$file,'msgret'=>$msgret]);
    }
    }

    public function download(Request $request){
        $file=$request->file;
        // $documentName=explode("public/documents/",$file);
        // $document=$documentName[1];
        $anotherName="Klipo".rand(0,9).Str::random(9) . '.' . pathinfo($file, PATHINFO_EXTENSION);
        // dd($anotherName);
        return response()->download($file, $anotherName);
    }
}
