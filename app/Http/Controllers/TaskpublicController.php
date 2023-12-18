<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Taskpublic;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskpublicController extends Controller
{
    public static function publicDay($table){
        $idsexclusa = [];
        $talks = Taskpublic::all();

        //verificar se $talks estávazia
        if(count($talks) > 0){
            $datenow = strtotime(date("Y-m-d H:i"));

            foreach ($talks as $talk){

                self::publicarObjeto($table, $talk->date_start, $talk->hour_start, $talk->date_end, $talk->hour_end, $talk->uid_from_who);

                // Adicionar IDs dos registros a serem excluídos
                if (self::dataHoraFinalPassada($talk->date_start, $talk->hour_start) && $talk->date_end == null) {
                    $idsexclusa[] = $talk->uid;
                }

                if (self::dataHoraFinalPassada($talk->date_end, $talk->hour_end) && $talk->date_end != null) {
                    $idsexclusa[] = $talk->uid;
                }

            }

            // Excluir registros cujas datas já passaram
            if (!empty($idsexclusa)) {
                Taskpublic::whereIn('uid', $idsexclusa)->delete();
            }
        }


    }

    private static function publicarObjeto($table, $dataInicial, $horasInicial, $dataFinal = null, $horaFinal = null, $uid)
    {

        // Criando objetos Carbon para manipulação de datas e horas
        $dataHoraInicial = Carbon::parse("$dataInicial $horasInicial");
        $dataHoraFinal = $dataFinal ? Carbon::parse("$dataFinal $horaFinal") : null;
        $dataAtual = Carbon::now();

        // Verificando se a data inicial é igual ou já passou $dataHoraInicial->isSameDay($dataAtual) ||
        if ($dataHoraInicial->isPast() && $dataHoraFinal == null) {
            // Lógica para publicar o artigo
            DB::table($table)->where('uid', $uid)->update([
                'status->public' => "public",
                'status->active' => true,
            ]);
        }else{
            DB::table($table)->where('uid', $uid)->update([
                'status->public' => "public_day",
                'status->active' => true,
            ]);
        }

        // Verificando se a data final é especificada e se é igual ou menor que a data atual $dataHoraFinal && $dataHoraFinal->isSameDay($dataAtual) ||
        if ($dataHoraFinal && $dataHoraFinal->isPast()) {
            // Lógica para finalizar a publicação do artigo
           DB::table($table)->where('uid', $uid)->update([
                'status->public' => "no_public",
                'status->date_start' => "",
                'status->hour_start' => "",
                'status->date_end' => "",
                'status->hour_end' => "",
                'status->active' => false,
            ]);
        }



    }


    private static function dataHoraFinalPassada($dataFinal, $horaFinal)
    {
        // Lógica para verificar se a data e hora final já passaram
        $dataHoraFinal = Carbon::parse("$dataFinal $horaFinal");
        $dataAtual = Carbon::now();

        return $dataHoraFinal->isPast();
    }


    //Traz o resultado do total de dias restantes
    public static function calculateDaysRemaining($endDate, $endTime)
    {

        if ($endDate == null || $endDate == "" || $endTime == null || $endTime == "") {
            return null;
        }

        $dataTeste = $endDate.' '.Carbon::parse($endTime)->format('H:i');

        $now = Carbon::now(); // Data e hora atuais

        $endDateTime = Carbon::createFromFormat('Y-m-d H:i', $dataTeste);

        // Calcula a diferença em dias entre a data atual e a data de término
        $interval = $now->diff($endDateTime);

        return $interval->days;

        }

        public static function TaskSave($uid_from_who, $date_start, $hour_start, $date_end, $hour_end){

            $task = Taskpublic::firstWhere('uid_from_who', $uid_from_who);

            if ($task == null) {

                $task = Taskpublic::create([
                    'uid' => Str::uuid(),
                    'uid_from_who' => $uid_from_who,
                    'date_start' => $date_start,
                    'hour_start' => $hour_start,
                    'date_end' => $date_end,
                    'hour_end' => $hour_end,
                ]);

            } else {

                Taskpublic::where('uid_from_who', $uid_from_who)->update([
                    'date_start' => $date_start,
                    'hour_start' => $hour_start,
                    'date_end' => $date_end,
                    'hour_end' => $hour_end,
                ]);

            }

            return;

        }

        public static function TaskDel($id_task){
            Taskpublic::where('id', $id_task)->delete();
        }

    }



