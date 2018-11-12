<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

use App\Winners;
use App\Config;
use App\Form;
use App\Form2;
use App\Form3;
use App\Form4;


class Winner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pick-winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pick a winner each period';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        $cfg = Config::find(1); //find periods

        $periode = [
            1 => ["id" => 1, "start" => $cfg->p1_start, "end" => $cfg->p1_end],
            2 => ["id" => 2, "start" => $cfg->p2_start, "end" => $cfg->p2_end],
            3 => ["id" => 3, "start" => $cfg->p3_start, "end" => $cfg->p3_end],
            4 => ["id" => 4, "start" => $cfg->p4_start, "end" => $cfg->p4_end],
        ];

        $today = new \DateTime();
        $today = $today->format('Y-m-d');

        foreach ($periode as $key => $value) {
            if($today == $value->end){ //if today is the last day
                $periode = $value->id;

                if(Winners::where('periode',$value->id)->get()->isEmpty()) { // if no winner selected yet

                    if ( $today >= $cfg->p1_start && $today <= $cfg->p1_end ) {
                        $winners=Form::where("reponse", 2014)->orderByRaw("RAND()")->take(1)->get();
                    }
                    elseif ( $today >= $cfg->p2_start && $today <= $cfg->p2_end ) {
                        $winners=Form2::where("reponse", 2014)->orderByRaw("RAND()")->take(1)->get();
                    }
                    elseif ( $today >= $cfg->p3_start && $today <= $cfg->p3_end ) {
                        $winners=Form3::where("reponse", 2014)->orderByRaw("RAND()")->take(1)->get();
                    }
                    elseif ( $today >= $cfg->p4_start && $today <= $cfg->p4_end ) {
                        $winners=Form4::where("reponse", 2014)->orderByRaw("RAND()")->take(1)->get();
                    }

                    if ($winners){
                        $winner = new Winners();
                        $winner->deelnemer  = $winners[0]->id;
                        $winner->periode    = $periode;
                        $winner->save();
                    }
                }
            }
        }


    }
}