<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ParagonIE\ConstantTime\Encoding;
use App\Http\Controllers\TaskpublicController;

use function Pest\Laravel\json;

class CoreController extends Controller
{
    public static function conjuntoVariaveis()
    {
        $dados = [
            'iconBootStrap' => self::iconBootStrap(),
            'menuPrincipal' => self::menuPrincipal(),
            'destaque' => self::destaque(),
            'sliderspreview' => self::sliderspreview(),
            'ultimaNoticias' => self::ultimaNoticias(),
            'linksExternos' => self::linksExternos(),
            'cardBox' => self::cardBox(),
            'materias' => self::categoriasMaterias(),
            'nivelEscolar' => self::nivelEscolar(),
        ];

        return $dados;
    }

    public static function conjuntoVariaveisDashboard()
    {
        TaskpublicController::publicDay();
        $dados = [
            'menudashbord' => self::menuDashbord(),
            'nivelEscolar' => self::nivelEscolar(),
            'menuTecnico' => self::menuDashbordTecnica(),
            'listsite' => self::listSite(),
            'position_spacial' => self::position_spacial(),
            'acess' => self::acess(),
            'classifications' => self::classification(),
            'type' => self::type(),
        ];

        return $dados;
    }

    public static function iconBootStrap() {

        $icos = [
            ['name' => "instagram",'link' => "", 'd' => ["M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"]],
            ['name' => "youtube",'link' => "https://www.youtube.com/@educacaoVilaVelha", 'd' => ["M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"]],
            ['name' => "whatsapp",'link' => "", 'd' => ["M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"]],
        ];

        return $icos;
    }

    public static function menuPrincipal(){
        $menu = [
            ['id' => "0", 'name' => "Inicio",     'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "1", 'name' => "Secretaria",     'route' => "secretaria", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "2", 'name' => "Notícias",   'route' => "noticias", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "3", 'name' => "NTE",        'route' => "nte",      'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "4", 'name' => "Ensina ON",  'route' => "ensinaon", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "5", 'name' => "Atividades", 'route' => "atividades", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "6", 'name' => "Biblioteca", 'route' => "biblioteca", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "7", 'name' => "Escolar",    'route' => "escolas", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "8", 'name' => "Tutoriais",  'route' => "tutoriais", 'active' => true, 'icon' => "", 'sub' => [] ],

        ];

        return $menu;
    }

    public static function menuDashbord(){
        $icon = [
                'artigo' => "fa-newspaper p-2",
                'escola' => "fa-solid fa-school-flag p-2",
                'atividades' => "fa-file-signature p-2",
                'configuracao' => "fa-gears p-2",
                'Dorcente' => "fa-chalkboard-user p-2",
                'eventos' => "fa-calendar-check p-2",
                'graficos' => "fa-chart-line p-2",
                'home' => "fa-house p-2",
                'jogos' => "fa-gamepad p-2",
                'livros' => "fa-book p-2",
                'processos' => "fa-folder-open p-2",
                'usuarios' => "fa-users p-2",
                'videos' => "fa-film p-2",
                'calendario' => "fa-calendar-days p-2",
                'linkext' => "fa-solid fa-link",

            ];

        $menu = [
            ['id' => "0", 'name' => "Inicio",       'route' => "dashboard", 'active' => true, 'icon' =>  $icon['home'] ],
            ['id' => "1", 'name' => "Artigo",       'route' => "dashartigo", 'active' => true, 'icon' =>  $icon['artigo'] ],
            ['id' => "2", 'name' => "Escola",       'route' => "dashescola", 'active' => true, 'icon' =>  $icon['escola'] ],
            ['id' => "3", 'name' => "Videos",       'route' => "dashvideo", 'active' => true, 'icon' =>  $icon['videos'] ],
            ['id' => "4", 'name' => "Calendário Escolar",   'route' => "dashcalendar", 'active' => true, 'icon' =>  $icon['calendario'] ],
            ['id' => "5", 'name' => "Atividade",    'route' => "dashatividade", 'active' => true, 'icon' =>  $icon['atividades'] ],
            ['id' => "6", 'name' => "Eventos",      'route' => "dasheventos", 'active' => true, 'icon' =>  $icon['eventos'] ],
            ['id' => "7", 'name' => "Graficos",     'route' => "dashgraficos", 'active' => false, 'icon' =>  $icon['graficos'] ],
            ['id' => "8", 'name' => "Jogos",        'route' => "dashjogos", 'active' => true, 'icon' =>  $icon['jogos'] ],
            ['id' => "9", 'name' => "livros",       'route' => "dashlivros", 'active' => true, 'icon' =>  $icon['livros'] ],
            ['id' => "10", 'name' => "Processos",    'route' => "dashprocessos", 'active' => true, 'icon' =>  $icon['processos'] ],
            ['id' => "11", 'name' => "Dorcente",     'route' => "dashdorcente", 'active' => false, 'icon' =>  $icon['Dorcente'] ],
            ['id' => "12", 'name' => "Usuários",    'route' => "dashusuarios", 'active' => true, 'icon' =>  $icon['usuarios'] ],
            ['id' => "13", 'name' => "Link Externo",'route' => "dashlinkexterno", 'active' => true, 'icon' =>  $icon['linkext'] ],
            ['id' => "14", 'name' => "Configurações",'route' => "dashconfig", 'active' => true, 'icon' =>  $icon['configuracao'] ],

        ];


        return $menu;
    }

    public static function menuDashbordTecnica(){
        $icon = [
                'home' => "fa-house p-2",
                'escola' => "fa-solid fa-school-flag p-2",
            ];

        $menu = [
            ['id' => "0", 'name' => "Inicio",       'route' => "dashinicio", 'active' => true, 'icon' =>  $icon['home'] ],
            ['id' => "2", 'name' => "Escola",       'route' => "dashtecescola", 'active' => true, 'icon' =>  $icon['escola'] ],

        ];


        return $menu;
    }

    public static function destaque(){

        $destaque = [
            [
                'id' => "1",
                'title' => "Titulo",
                'subtitle' => "Sub Titulo",
                'texto' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed.",
                'link' => "welcome",
                'data' => "Wed. Aug 09/2023 11:21:52",
                'public' => true
            ],

            [
                'id' => "2",
                'title' => "Titulo",
                'subtitle' => "Sub Titulo",
                'texto' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed.",
                'link' => "welcome",
                'data' => "Wed. Aug 09/2023 11:21:52",
                'public' => true
            ],

            [
                'id' => "3",
                'title' => "Titulo",
                'subtitle' => "Sub Titulo",
                'texto' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed.",
                'link' => "welcome",
                'data' => "Wed. Aug 09/2023 11:21:52",
                'public' => true
            ],

            [
                'id' => "4",
                'title' => "Titulo",
                'subtitle' => "Sub Titulo",
                'texto' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed.",
                'link' => "welcome",
                'data' => "Wed. Aug 09/2023 11:21:52",
                'public' => true
            ],

        ];
        return $destaque;
    }

    public static function sliderspreview() {

        $dados = [
            [
                'id' => "1",
                'title' => "Jovens atletas campões estaduais dos Jogos Escolares recebem homenagens",
                'link' => "https://www.vilavelha.es.gov.br/noticias/2023/08/jovens-atletas-campoes-estaduais-dos-jogos-escolares-recebem-homenagens-40706",
                'data' => "02 de agosto de 2023",
                'img' => "slider/52529_01082023_900x500.jpg",
                'public' => true
            ],

            [
                'id' => "2",
                'title' => "Educação ambiental: creche realiza caminhada ecológica, horta e coleta seletiva",
                'link' => "https://www.vilavelha.es.gov.br/noticias/2023/08/educacao-ambiental-creche-realiza-caminhada-ecologica-horta-e-coleta-seletiva-40746",
                'data' => "09 de agosto de 2023",
                'img' => "slider/52558_09082023_900x500.jpg",
                'public' => true
            ],

            [
                'id' => "3",
                'title' => "Ações em escolas celebram avanços dos 17 anos da Lei Maria da Penha",
                'link' => "https://www.vilavelha.es.gov.br/noticias/2023/08/acoes-em-escolas-celebram-avancos-dos-17-anos-da-lei-maria-da-penha-40750",
                'data' => "09 de agosto de 2023",
                'img' => "slider/52562_09082023_900x500.jpg",
                'public' => true
            ],
        ];

        return $dados;

    }

    public static function ultimaNoticias() {

        $dados = [
            [
                'id' => "1",
                'destaque' => true,
                'title' => "Jovens atletas campões estaduais dos Jogos Escolares recebem homenagens",
                'texto' => "Ensinar sobre a importância do cuidado com o meio ambiente e estimular a adoção de hábitos sustentáveis desde a infância. Com esse foco, a UMEI Maria Elisa Vereza Coutinho, localizada em São Conrado, tem desenvolvido uma série de atividades abordando temáticas relacionadas à Educação Ambiental.",
                'route' => "welcome",
                'data' => "02 de agosto de 2023",
                'img' => "slider/52529_01082023_900x500.jpg",
                'public' => true
            ],

            [
                'id' => "2",
                'destaque' => true,
                'title' => "Educação ambiental: creche realiza caminhada ecológica, horta e coleta seletiva",
                'texto' => "Ensinar sobre a importância do cuidado com o meio ambiente e estimular a adoção de hábitos sustentáveis desde a infância. Com esse foco, a UMEI Maria Elisa Vereza Coutinho, localizada em São Conrado, tem desenvolvido uma série de atividades abordando temáticas relacionadas à Educação Ambiental.",
                'route' => "welcome",
                'data' => "09 de agosto de 2023",
                'img' => "slider/52558_09082023_900x500.jpg",
                'public' => true
            ],

            [
                'id' => "3",
                'destaque' => true,
                'title' => "Ações em escolas celebram avanços dos 17 anos da Lei Maria da Penha",
                'texto' => "Ensinar sobre a importância do cuidado com o meio ambiente e estimular a adoção de hábitos sustentáveis desde a infância. Com esse foco, a UMEI Maria Elisa Vereza Coutinho, localizada em São Conrado, tem desenvolvido uma série de atividades abordando temáticas relacionadas à Educação Ambiental.",
                'route' => "welcome",
                'data' => "09 de agosto de 2023",
                'img' => "slider/52562_09082023_900x500.jpg",
                'public' => true
            ],

            [
                'id' => "4",
                'destaque' => false,
                'title' => "Ações em escolas celebram avanços dos 17 anos da Lei Maria da Penha",
                'texto' => "Ensinar sobre a importância do cuidado com o meio ambiente e estimular a adoção de hábitos sustentáveis desde a infância. Com esse foco, a UMEI Maria Elisa Vereza Coutinho, localizada em São Conrado, tem desenvolvido uma série de atividades abordando temáticas relacionadas à Educação Ambiental.",
                'route' => "welcome",
                'data' => "09 de agosto de 2023",
                'img' => "slider/52562_09082023_900x500.jpg",
                'public' => true
            ],
        ];

        return $dados;

    }

    public static function linksExternos() {

        $dados = [
            ['id'=>"1", 'ico' => "google/Gmail_Logo_512px.png",              'title' => "Google Gmail",     'link' => "https://mail.google.com/mail/u/0/#inbox"],
            ['id'=>"2", 'ico' => "google/google-drive.svg",                  'title' => "Google Driver",    'link' => "https://drive.google.com/drive/my-drive"],
            ['id'=>"3", 'ico' => "google/google-classroom-seeklogo.com.svg", 'title' => "Google Classroom", 'link' => "https://classroom.google.com"],
        ];

        return $dados;
    }

    public static function cardBox() {

        $dados = [
            ['id'=>"1", 'ico' => "google/Gmail_Logo_512px.png",              'title' => "Escolas",     'link' => "https://mail.google.com/mail/u/0/#inbox", 'color' => "#fcba03"],
            ['id'=>"2", 'ico' => "google/google-drive.svg",                  'title' => "Disiplinas",    'link' => "https://drive.google.com/drive/my-drive", 'color' => "#6db543"],
            ['id'=>"3", 'ico' => "google/google-classroom-seeklogo.com.svg", 'title' => "Cursos", 'link' => "https://classroom.google.com", 'color' => "#434db5"],
            ['id'=>"4", 'ico' => "google/google-classroom-seeklogo.com.svg", 'title' => "Projeto Educacional", 'link' => "https://classroom.google.com", 'color' => "#aa43b5"],
        ];

        return $dados;
    }

    public static function noticias() {

        $dados = [
            'id'=>"1",
            'img' => [
                ['id' => "", 'author' => "", 'descrition' => "", 'url' => "" ],
            ],
            'title' => "Escolas",
            'subtitle' => "",
            'link' => "https://mail.google.com/mail/u/0/#inbox",
            'date' => ['cricao' => "", 'atualizacao' => ""],
            'texto' => "",
            'public' => "",
        ];

        return $dados;

    }

    public static function nivelEscolar(){
        $nivelescolar = [
            ['id' => "0", 'name' => "Educação Infantil",     'active' => true, 'icon' => "",  ],
            ['id' => "1", 'name' => "Ensino Fundamental",    'active' => true, 'icon' => "",  ],
            ['id' => "2", 'name' => "Ensino Tempo Integral", 'active' => true, 'icon' => "",  ],
            ['id' => "3", 'name' => "EJA",                   'active' => true, 'icon' => "",  ],

        ];

        return $nivelescolar;
    }

    public static function categoriasMaterias(){
        $materias = [
            ['id' => "0", 'name' => "Arte",              'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "1", 'name' => "Biologia",          'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "2", 'name' => "Ciência",           'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "3", 'name' => "Educação Física",   'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "4", 'name' => "Filosofia",         'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "5", 'name' => "Física",            'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "6", 'name' => "Geografia",         'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "7", 'name' => "Língua Inglesa",    'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "7", 'name' => "Língua Portuguesa", 'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "7", 'name' => "Matemática",        'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "7", 'name' => "Química",           'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "7", 'name' => "Sociologia",        'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
            ['id' => "7", 'name' => "Informática",       'route' => "welcome", 'active' => true, 'icon' => "", 'sub' => [] ],
        ];

        return $materias;
    }

    public static function menucalendar(){

        $menuCalendar = [
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

        return $menuCalendar;
    }

    /* Modelos Json */

    public static function position_spacial(){
        $position =  [
            ['id' => "01", 'title' => "Nenhum", 'public' => true],
            ['id' => "02", 'title' => "Lado direito", 'public' => true],
            ['id' => "03", 'title' => "Lado esquerdo", 'public' => true],
            ['id' => "04", 'title' => "base", 'public' => true],
        ];

        return $position;
    }

    public static function acess(){
        $acesso = [
            ['id' => "01", 'title' => "Publico", 'public' => true],
            ['id' => "02", 'title' => "Privado", 'public' => true],
            ['id' => "03", 'title' => "Somente o Grupo", 'public' => true],

        ];

        return $acesso;
    }

    public static function status($public, $date_start, $date_end, $hour_start, $hour_end, $active){

        $st = [
            'public' => $public,
            'date_start' => $date_start,
            'hour_start' => $hour_start,
            'date_end' => $date_end,
            'hour_end' => $hour_end,
            'active' => $active,
        ];

        //$status = json_encode($st);

        return $st;
    }

    public static function config($show_author, $show_day_public, $show_day_alteration, $show_description, $show_url, $show_download, $show_author_photo, $show_author_video, $show_print, $show_share){
        $cg = [
            'show_author' => $show_author,
            'show_day_public' => $show_day_public,
            'show_day_alteration' => $show_day_alteration,
            'show_description' => $show_description,
            'show_url' => $show_url,
            'show_download' => $show_download,
            'show_author_photo' => $show_author_photo,
            'show_author_video' => $show_author_video,
            'show_print' => $show_print,
            'show_share' => $show_share,
        ];
        //$config = json_encode($cg);
        return $cg;
    }

    public static function creators($dados){
        $cr = (object) [
            'id_user' => "",
            'author' => "",
            'company' => "",
            'description' => "",
        ];
        //$creators = json_encode($cr);
        return $cr;
    }

    public static function response(){
        $response = (object) [
            'position' => "",
            'answers' => "",
            'value' => "",
        ];

        return $response;
    }

    public static function type(){
        $response = (object) [
            ['id' => 1, 'title' => "fotografia"],
            ['id' => 2, 'title' => "Imagem digital"],
            ['id' => 3, 'title' => "desenho digital"],
            ['id' => 4, 'title' => "desenho manual"],
            ['id' => 5, 'title' => "grafico"],
            ['id' => 6, 'title' => "pintura"],
            ['id' => 7, 'title' => "tabela"],

        ];

        return $response;
    }

    public static function authoractiv(){
        $response = (object) [
            'id_user' => "",
            'author' => "",
            'name' => "",
        ];

        return $response;
    }

    public static function day_join(){

        $day_join = (object) [
            'id' => "",
            'days' => "",
            'legenda' => "",
        ];

        $day = (object) [
            'day' => "",
            'month' => "",
            'year' => "",
            'cor_text' => "",
            'cor_bg' => "",
        ];

        $response = (object)[
            'day_join' => $day_join,
            'day' => $day,
        ];

        return $response;
    }

    /* Listas */

    public static function listSite(){
        $category = (object) [
            ['id' => "01", 'title' => "ATIVIDADE EDUCACIONAL", 'public' => true, 'sub' => []],
            ['id' => "02", 'title' => "BIBLIOTECA", 'public' => true, 'sub' => []],
            ['id' => "03", 'title' => "COMITÊ", 'public' => true, 'sub' => []],
            ['id' => "04", 'title' => "ESCOLAS", 'public' => true, 'sub' => []],
            ['id' => "05", 'title' => "INTERDISCIPLINAR", 'public' => true, 'sub' => [
                ['id' => "51", 'title' => "ALIMENTAÇÃO", 'public' => true],
                ['id' => "52", 'title' => "AMBIENTAL", 'public' => true],
                ['id' => "53", 'title' => "ARTE E CULTURA", 'public' => true],
                ['id' => "54", 'title' => "ESPORTE", 'public' => true],
                ['id' => "55", 'title' => "PRÁTICA EXITOSAS", 'public' => true],
                ['id' => "56", 'title' => "ROBÓTICA", 'public' => true],
                ['id' => "57", 'title' => "JOGOS", 'public' => true],
                ['id' => "58", 'title' => "SAÚDE", 'public' => true],
                ['id' => "59", 'title' => "LÚDICO", 'public' => true],
                ['id' => "510", 'title' => "TODOS", 'public' => true],
            ]],
            ['id' => "06", 'title' => "NOTICIAS", 'public' => true, 'sub' => []],
            ['id' => "07", 'title' => "TUTORIAL", 'public' => true, 'sub' => []],

        ];

        return $category;
    }

    public static function classification(){
        $response = (object) [
            ['id' => "1", 'title' => "Livre (L)", 'anos' => "L",  'public' => true, 'desc' => "Violência: Arma sem violência; Morte sem Violência; Ossada ou esqueleto sem violência; Violência Fantasiosa. Sexo e Nudez: Nudez não erótica. Drogas: Consumo moderado ou insinuado de droga lícita."],
            ['id' => "2", 'title' => "Não recomendado para menores de 10 (dez) anos", 'anos' => "10", 'cor'=> "#00b150", 'public' => true, 'desc' => "Violência: Angústia; Arma com violência; Ato criminoso sem violência; Linguagem depreciativa; Medo ou tensão; Ossada ou esqueleto com resquício de ato de violência Sexo e Nudez: Conteúdo educativo sobre sexo. Drogas: Descrição do consumo de droga lícita; Discussão sobre o tema drogas; Uso medicinal de droga ilícita."],
            ['id' => "3", 'title' => "Não recomendado para menores de 12 (doze) anos", 'anos' => "12", 'cor'=> "#00CDFF", 'public' => true, 'desc' => "Violência: Agressão verbal; Assédio sexual; Ato violento; Ato violento contra animal; Bullying; Descrição de violência; Exposição ao perigo; Exposição de cadáver; Exposição de pessoa em situação constrangedora ou degradante; Lesão corporal; Morte derivada de ato heróico; Morte natural ou acidental com dor ou violência; Obscenidade; Presença de sangue; Sofrimento da vítima; Supervalorização da beleza física; Supervalorização do consumo; Violência psicológica. Sexo e Nudez: Apelo sexual; Carícia sexual; Insinuação sexual; Linguagem chula; Linguagem de conteúdo sexual; Masturbação; Nudez velada; Simulação de sexo. Drogas: Consumo de droga lícita; Consumo irregular de medicamento; Discussão sobre legalização de droga ilícita; Indução ao uso de droga lícita; Menção a droga ilícita."],
            ['id' => "4", 'title' => "Não recomendado para menores de 14 (quatorze) anos", 'anos' => "14", 'cor'=> "#FFCC00", 'public' => true, 'desc' => "Violência: Aborto; Estigma ou preconceito; Eutanásia; Exploração sexual; Morte intencional; Pena de morte. Sexo e Nudez: Erotização; Nudez; Prostituição; Relação sexual; Vulgaridade. Drogas: Consumo insinuado de droga ilícita; Descrição do consumo ou tráfico de droga ilícita."],
            ['id' => "5", 'title' => "Não recomendado para menores de 16 (dezesseis) anos", 'anos' => "16",'cor'=> "#FF6600",  'public' => true, 'desc' => "Violência: Ato de pedofilia; Crime de ódio; Estupro ou coação sexual; Mutilação; Suicídio; Tortura; Violência gratuita ou banalização da violência. Sexo e Nudez: Relação sexual intensa. Drogas: Consumo de droga ilícita; Indução ao consumo de droga ilícita; Produção ou tráfico de droga ilícita."],
            ['id' => "6", 'title' => "Não recomendado para menores de 18 (dezoito) anos", 'anos' => "18", 'cor'=> "#000000", 'public' => true, 'desc' => "Violência: Apologia à violência; Crueldade. Sexo e Nudez: Sexo explícito; Situação sexual complexa ou de forte impacto. Drogas: Apologia ao uso de droga ilícita."],
        ];

        return $response;
    }

}
