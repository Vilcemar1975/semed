<?php

namespace App\Livewire;

use DateTime;
use Livewire\Component;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Http\Controllers\CoreController;

class CalendarShow extends Component
{

    #public $menuCalendar;
    public $anoemes = "novo";
    public $diasemana = array('domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sabado');

    public static function mestotal(){

        //Define a localidade de determinado país.
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');
        for ($i=1; $i < 13; $i++) {

            $data = date("Y-".$i);

            extract(date_parse_from_format("Y-m-d", $data));
            $monthTime = strtotime("{$year}-{$month}-1");

            $menuCalendar[$i-1]['calendar'] = $monthTime;
        }

        return;
    }


    public function render()
    {

        $dados = CoreController::conjuntoVariaveisDashboard();
        CalendarShow::mestotal();
        return view('livewire.calendar-show',['dados' => $dados]);
    }
}
