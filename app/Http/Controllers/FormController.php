<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Form2;
use App\Form3;
use App\Form4;
use App\Config;
use App\Winners;

class FormController extends Controller
{   
    public function index(){
        $winner1 = '';
        $winner2 = '';
        $winner3 = '';
        $winner4 = '';
        
        $winners = Winners::all();
        
        foreach ($winners as $winner => $value) {
            $winnerID = $value->deelnemer;
            if ($value->periode == 1){
                $winner1 = Form::find($winnerID)->name;
            }
            if ($value->periode == 2){
                $winner1 = Form2::find($winnerID)->name;
            }
            if ($value->periode == 3){
                $winner1 = Form3::find($winnerID)->name;
            }
            if ($value->periode == 4){
                $winner1 = Form4::find($winnerID)->name;
            }
        }

        return view('prijsvraag', ["winner1" => $winner1, "winner2" => $winner2, "winner3" => $winner3, "winner4" => $winner4]);
    }


    public function submit(Request $request){
    	$this->validate($request, [
    		'response' => 'required|integer|max:2020',
    		'amount' => 'required|integer|max:1000000000',
    		'name' => 'required|string|max:255',
    		'email' => 'required|string|email|max:255|unique:users'
    	]);

        $cfg = Config::find(1);

        //check which period is today
        $today = new \DateTime();
        $today = $today->format('Y-m-d');
        $msg = '';
        
        //$today = '2017-01-02'; //test no period
        //$today = '2018-12-02'; //test p1
        //$today = '2019-01-02'; //test p2
        //$today = '2019-02-02'; //test p3
        //$today = '2019-03-02'; //test p4
        
        //take correct table
        if ( $today >= $cfg->p1_start && $today <= $cfg->p1_end ) {
            $msg = new Form;
            // IP & EMAIL check, if user already entered FIRST form
            if ( Form::where('ip', '=', $request->ip())->exists() ) {
                return redirect('/prijsvraag')->with('error', 'U heeft al deelgenomen!');
            }
            if (Form::where('email', '=', $request->input('email'))->exists()) {
                return redirect('/prijsvraag')->with('error', 'Dit email adress doet al mee!');
            }
        }
        elseif ( $today >= $cfg->p2_start && $today <= $cfg->p2_end ) {
            $msg = new Form2;
            // IP & EMAIL check, if user already entered SECOND form
            if ( Form2::where('ip', '=', $request->ip())->exists() ) {
                return redirect('/prijsvraag')->with('error', 'U heeft al deelgenomen!');
            }
            if (Form2::where('email', '=', $request->input('email'))->exists()) {
                return redirect('/prijsvraag')->with('error', 'Dit email adress doet al mee!');
            }
        }
        elseif ( $today >= $cfg->p3_start && $today <= $cfg->p3_end ) {
           $msg = new Form3;
            // IP & EMAIL check, if user already entered THIRD form
            if ( Form3::where('ip', '=', $request->ip())->exists() ) {
                return redirect('/prijsvraag')->with('error', 'U heeft al deelgenomen!');
            }
            if (Form3::where('email', '=', $request->input('email'))->exists()) {
                return redirect('/prijsvraag')->with('error', 'Dit email adress doet al mee!');
            }
        }
        elseif ( $today >= $cfg->p4_start && $today <= $cfg->p4_end ) {
           $msg = new Form4;
            // IP & EMAIL check, if user already entered FOURTH form
            if ( Form4::where('ip', '=', $request->ip())->exists() ) {
                return redirect('/prijsvraag')->with('error', 'U heeft al deelgenomen!');
            }
            if (Form4::where('email', '=', $request->input('email'))->exists()) {
                return redirect('/prijsvraag')->with('error', 'Dit email adress doet al mee!');
            }
        }

        //check if period is found, otherwise its closed
        if ($msg != '') { 
            $msg->response  = $request->input('response');
            $msg->amount    = $request->input('amount');
            $msg->name      = $request->input('name');
            $msg->email     = $request->input('email');
            $msg->ip        = $request->ip();

            $msg->save();

            return redirect('/prijsvraag')->with('succes', 'Bedankt voor uw deelname!');
        }
        else{
            return redirect('/prijsvraag')->with('error', 'De prijsvraag is gesloten!');
        }

    }
}