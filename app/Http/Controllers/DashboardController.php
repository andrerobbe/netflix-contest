<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Form2;
use App\Form3;
use App\Form4;
use App\Config;


class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	protected function getPeriod(){

		return;
	}


	public function getResponses(){
		$cfg = Config::find(1);

		//check which period is today
		$today = new \DateTime();
		$today = $today->format('Y-m-d');
		$p = '';
		$deelnames = '';

		//$today = '2017-01-02'; //test no period
        //$today = '2018-12-02'; //test p1
        //$today = '2019-01-02'; //test p2
        //$today = '2019-02-02'; //test p3
        //$today = '2019-03-02'; //test p4

		if (isset($cfg)) { //in case DB is empty
			if ( $today >= $cfg->p1_start && $today <= $cfg->p1_end ) {
				$p = 'Periode 1';
				$deelnames = Form::all();
			}
			elseif ( $today >= $cfg->p2_start && $today <= $cfg->p2_end ) {
			   $p = 'Periode 2';
			   $deelnames = Form2::all();
			}
			elseif ( $today >= $cfg->p3_start && $today <= $cfg->p3_end ) {
			   $p = 'Periode 3';
			   $deelnames = Form3::all();
			}
			elseif ( $today >= $cfg->p4_start && $today <= $cfg->p4_end ) {
			   $p = 'Periode 4';
			   $deelnames = Form4::all();
			}
			else{
				$p = 'Er is momenteel geen wedstrijd actief!';
			}
		}

		else{
			$p = 'Er is momenteel geen wedstrijd actief!';
		}

		return view('dashboard', ["deelnames" => $deelnames, "periode" => $p]);
	}



	public function getSavedResponses($id){
		if ( $id == 1 ){
			$p = 'Periode 1';
			$deelnames = Form::all();
		}
		elseif ( $id == 2 ) {
			$p = 'Periode 2';
			$deelnames = Form2::all();
		}
		elseif ( $id == 3 ) {
			$p = 'Periode 3';
			$deelnames = Form3::all();
		}
		elseif ( $id == 4 ) {
			$p = 'Periode 4';
			$deelnames = Form4::all();
		}
		else{
			$p = 'Deze periode bestaat niet!';
			$deelnames = '';
		}
		
		return view('dashboard', ["deelnames" => $deelnames, "periode" => $p]);
	}




	public function delete(Request $request){
		//hidden input checkbox-array, which value is filled by JS depending on which CB is checked
		
		// https://stackoverflow.com/questions/9593765/how-to-convert-array-values-from-string-to-int
		$checked_boxes = array_map('intval', explode(',', $request->input('checkbox-array')) );

		//check which period is today
		$today = new \DateTime();
		$today = $today->format('Y-m-d');
		$cfg = Config::find(1);

		$participant = '';

		//check which form is current
		//loop through to find id and delete 
		if ( $today >= $cfg->p1_start && $today <= $cfg->p1_end ) {
			for ($i=0; $i < count($checked_boxes); $i++) {
				$participant = Form::find($checked_boxes[$i]);
				$participant->delete();
			}
		}
		elseif ( $today >= $cfg->p2_start && $today <= $cfg->p2_end ) {
			for ($i=0; $i < count($checked_boxes); $i++) {
				$participant = Form2::find($checked_boxes[$i]);
				$participant->delete();
			}
		}
		elseif ( $today >= $cfg->p3_start && $today <= $cfg->p3_end ) {
			for ($i=0; $i < count($checked_boxes); $i++) {
				$participant = Form3::find($checked_boxes[$i]);
				$participant->delete();
			}
		}
		elseif ( $today >= $cfg->p4_start && $today <= $cfg->p4_end ) {
			for ($i=0; $i < count($checked_boxes); $i++) {
				$participant = Form4::find($checked_boxes[$i]);
				$participant->delete();
			}
		}
		else{
			$participant = 'ERROR';
		}


		//will only return lastest deleted ID if multiple selected, need to make array of partipant and do 1 delete
		return redirect('/dashboard')->with('success', 'Succesfully deleted participant with id '/* + $participant + '!'*/);
    }
}