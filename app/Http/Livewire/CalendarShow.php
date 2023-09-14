<?php

namespace App\Http\Livewire;

use DateTime;
use Livewire\Component;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class CalendarShow extends Component
{
    public $menuCalendar = [
        ['id' => "1",   'mes' => "janeiro",   'nick' => "janeiro",     'abv' => "jan.", 'calendar' => [] ],
        ['id' => "2",   'mes' => "fevereiro", 'nick' => "fevereiro",   'abv' => "fev.", 'calendar' => [] ],
        ['id' => "3",   'mes' => "março",     'nick' => "março",       'abv' => "mar.", 'calendar' => [] ],
        ['id' => "4",   'mes' => "abril",     'nick' => "abril",       'abv' => "abr.", 'calendar' => [] ],
        ['id' => "5",   'mes' => "maio",      'nick' => "maio",        'abv' => "maio", 'calendar' => [] ],
        ['id' => "6",   'mes' => "junho",     'nick' => "junho",       'abv' => "jun.", 'calendar' => [] ],
        ['id' => "7",   'mes' => "julho",     'nick' => "julho",       'abv' => "jul.", 'calendar' => [] ],
        ['id' => "8",   'mes' => "agosto",    'nick' => "agosto",      'abv' => "ago.", 'calendar' => [] ],
        ['id' => "9",   'mes' => "setembro",  'nick' => "setembro",    'abv' => "set.", 'calendar' => [] ],
        ['id' => "10",  'mes' => "outubro",   'nick' => "outubro",     'abv' => "out.", 'calendar' => [] ],
        ['id' => "11",  'mes' => "novembro",  'nick' => "novembro",    'abv' => "nov.", 'calendar' => [] ],
        ['id' => "12",  'mes' => "dezembro",  'nick' => "dezembro",    'abv' => "dez.", 'calendar' => [] ],
    ];

    public $anoemes = "novo";
    public $diasemana = array('domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sabado');

    public function mestotal(){
        $day = [];
        $dias = [];



        $ano = date('Y');



        //Define a localidade de determinado país.
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');

        for ($i=0; $i < 12; $i++) {
            $mescorpo = [
                'dom' => [],
                'nome' => "",
                'seg' => [],
                'ter' => [],
                'qua' => [],
                'qui' => [],
                'sex' => [],
                'sab' => [],
                'ano' => "",
                'total_dias' => "",
            ];
            $segD = [];
            $terD = [];
            $quaD = [];
            $quiD = [];
            $sexD = [];
            $sabD = [];
            $domD = [];
            //Retorna um novo objeto DateTime formatado de acordo com um formato informado
            $dateObj   = DateTime::createFromFormat('m', $i+1);
            $nome_mes = strftime( '%B', $dateObj -> getTimestamp() );
            $mess = $i+1;

            //salva em um array qtos dias tem no determinado mês
            $array_num_dias = Array();

            $array_num_dias = cal_days_in_month(CAL_GREGORIAN, $mess, $ano);


            for ($d=1; $d < $array_num_dias; $d++) {
                $data = date($ano.'-'.$mess.'-'.$d);
                $diasemana_numero = date('w', strtotime($data));

                switch ($diasemana_numero) {
                    case '0':
                        array_push($domD, $d );
                        break;
                    case '1':
                        array_push($segD, $d );
                        break;
                    case '2':
                        array_push($terD, $d );
                        break;
                    case '3':
                        array_push($quaD, $d );
                        break;
                    case '4':
                        array_push($quiD, $d );
                        break;
                    case '5':
                        array_push($sexD, $d );
                        break;
                    case '6':
                        array_push($sabD, $d );
                        break;
                }

            }



            $mescorpo = [
                'nome' => $this->menuCalendar[$i]['mes'],
                'dom' => $domD,
                'seg' => $segD,
                'ter' => $terD,
                'qua' => $quaD,
                'qui' => $quiD,
                'sex' => $sexD,
                'sab' => $sabD,
                'ano' => $ano,
                'total_dias' => $array_num_dias,
            ];

            $this->menuCalendar[$i]['calendar'] = $mescorpo;

        }


        return;
    }

    public function render()
    {
        CalendarShow::mestotal();
        return view('livewire.calendar-show');
    }
}
