<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;

class ConfigController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$cfg = Config::find(1);
    	return view('config', ["cfg"=>$cfg]);
	}


	public function submit(Request $request){
    	$this->validate($request, [
    		'email' => 'required|string|email|max:255',
    		'p1_start' => 'required|date',
    		'p1_end' => 'required|date',
    		'p2_start' => 'required|date',
    		'p2_end' => 'required|date',
    		'p3_start' => 'required|date',
    		'p3_end' => 'required|date',
    		'p4_start' => 'required|date',
    		'p4_end' => 'required|date',
    	]);

        //if already set in db, overwrite, else create new
        if(Config::find(1)){ 
            $cfg        = Config::find(1);
        }
        else{
            $cfg        = new Config;
        }
    	
        $cfg->email 	= $request->input('email');
        $cfg->p1_start 	= $request->input('p1_start');
        $cfg->p1_end 	= $request->input('p1_end');
        $cfg->p2_start 	= $request->input('p2_start');
        $cfg->p2_end 	= $request->input('p2_end');
        $cfg->p3_start 	= $request->input('p3_start');
        $cfg->p3_end 	= $request->input('p3_end');
        $cfg->p4_start 	= $request->input('p4_start');
        $cfg->p4_end 	= $request->input('p4_end');

        $cfg->save();
        return redirect('/config')->with('succes', 'Updated succesfully');
    }
}
