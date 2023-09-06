@extends('template.app')

@section('title')
    Escolas
@endsection

@section('menu')
    @include('components.menu.menu_pric')
    @include('components.menu.titulo_princ',['title' => "Escolas"])
@endsection
@section('subtop')
    @include('components.pesquisa_materias', ['title' => "Lista de Escolas",'dados' => $dados['materias']])
    <br>
@endsection
@section('container-left')
    {{-- @include('components.cards.card_destaques_peq') --}}
    @include('components.menu.menu_topicos')
@endsection

@section('container-right')
    @include('components.cards.card_ultmas_noticias_peq',['dados' => $dados['ultimaNoticias']])

@endsection

@section('container-slider')
        @include('components.site_track')
        @include('components.sliders.slider',['dados' => $dados['sliderspreview']])
@endsection

@section('container-slider-bottom')

@endsection

@section('container-faixa')
    <h3 class="rotulo mt-3 mb-3">Noticia das Escolas</h3>
    <div class="card_ind_livro_contianer">
        @for ($x=0;$x < 3; $x++)
            <div class="card_ind_livro">
                <div class="card_ind_livro_img" style="background-image: url({{asset('storage/padrao/img.jpeg')}})"></div>
                <div class="card_ind_livro_corpo">
                    <h4>Primeiro</h4>
                    <h3>Titulo</h3>
                    <p>Conheça e explore o site do Núcleo de Tecnologia Educacional (NTE) da Prefeitura Municipal de Vila Velha. Aqui você encontrará recursos,</p>
                    <a href="#">Ler mais...</a>
                </div>
            </div>
        @endfor
    </div>


    <div class="bg-white shadow-lg p-5 text-azul-100 text-justify mt-5" >
        <h3 class="rotulo-padrao">Quem Somos?</h3>
        <p>
            Conheça e explore o site do Núcleo de Tecnologia Educacional (NTE) da Prefeitura Municipal de Vila Velha. Aqui você encontrará recursos, ferramentas e conteúdos midiáticos, atividades complementares, sugestões para formação continuada, bem como diversas opções para auxiliar os professores e alunos em todas as fases do processo de incorporação e uso das Tecnologias de Informação e Comunicação (TICs) em atividades didático-pedagógicas.
        </p>
    </div>

    {{-- <a href="#">
                <div class="video_card" style="background-image: url({{asset('storage/padrao/videos_2.png')}})">
                    <div class="video_corpo">
                        <h3>Titulo</h3>
                        <p>descricao</p>
                    </div>
                </div>
            </a> --}}

    {{-- Lista de Livros --}}
    <div class="contaniner-padrao">
        <h3 class="rotulo-padrao">Escola da Rede</h3>
        <p class="subrotulo-padrao">Lista de unidades escolares de Vila Velha.</p>
        <div class="flex flex-wrap justify-around p-2 rounded-lg shadow gap-2 text-azul-100 bg-white">
            <div class="flex  gap-1">
                <b>UMEI:</b>
                <p>26 unid.</p>
            </div>
            <div class="flex gap-1">
                <b>UMEF:</b>
                <p>86 unid.</p>
            </div>
            <div class="flex gap-1">
                <b>TOTAL:</b>
                <p>112 unid.</p>
            </div>
            <div class="flex gap-1">
                <b>Tempo Integral:</b>
                <p>10 unid.</p>
            </div>
        </div>
        <div class="list-padrao">
            @for ($h=0;$h < 10;$h++)
                @include('components.cards.card_videos', [
                    'idLivro' => "",
                    'img' => "storage/padrao/img.jpeg",
                    'title' => "Titulo",
                    'texto' => "busca atender aos objetivos educacionais previamente estabelecido visando aspectos pedagógicos e sociais",
                ])
            @endfor
        </div>
    </div>
    <br>
    {{-- Datas comemorativas --}}
    <div class="contaniner-padrao" style="background-color: #76a7fc7e;">
        <div class="flex flex-row justify-center lg:flex-nowrap gap-4 flex-wrap">
            <div class="basis-[100%] lg:basis-[60%]">
                <h3 class="rotulo-padrao">Datas Comemorativas</h3>
                <p class="subrotulo-data">Janeiro</p>
                <div class="list-padrao">
                    @for ($h=0;$h < 10;$h++)
                        @include('components.cards.card_dia_comemorativas', [
                            'iddata' => "",
                            'title' => "Feliz Pascoa Feliz Pascoa Feliz Pascoa",
                            'dia' => "15",
                        ])
                    @endfor
                </div>
            </div>
            <div class="basis-[100%] lg:basis-[40%] bg-white p-2 rounded-lg">
                <h3 class="rotulo-padrao">Calendário Escolar</h3>
                <br>
                @include('components.cards.card_celular_mes', [
                            'iddata' => "",
                            'title' => "Janeiro",
                            'dias' => [],
                        ])
                <a class="botao_calendário" href="{{route('calendarios')}}">
                    Abrir Calendário
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="contaniner-padrao">
        <h3 class="rotulo-padrao">Projeto nas Escolar</h3>
        <p class="subrotulo-padrao">Projetos Realizados em escolas da rede.</p>
        <div class="list-padrao">
            @for ($h=0;$h < 10;$h++)
                @include('components.cards.card_livros', [
                    'idLivro' => "",
                    'img' => "storage/padrao/img.jpeg",
                    'title' => "Titulo",
                    'texto' => "busca atender aos objetivos educacionais previamente estabelecido visando aspectos pedagógicos e sociais",
                ])
            @endfor
        </div>
    </div>
    <br>
    <div class="faixa-prime">
        @include('components.cards.cardbox',['dados' => $dados['cardBox']])
        @include('components.cards.card_link_externo',['dados' => $dados['linksExternos']])
    </div>
@endsection
@section('footer')
    @include('components.footer.menu_footer')
    @include('components.footer.logo_footer')
@endsection

@section('scriptbottom')
    <script>
        function abrirCardNTE(value) {

            var card = document.getElementById(value);
            var ico = document.getElementById('ico_'+value);
            var oculto = card.style.display;

            if(oculto == 'none'){
                card.removeAttribute('style');
                ico.removeAttribute('class');
                ico.setAttribute('class', "fa-solid fa-chevron-up");
            }else{
                card.setAttribute('style', "display:none;");
                ico.removeAttribute('class');
                ico.setAttribute('class', "fa-solid fa-chevron-up fa-rotate-180");
            }

        }
    </script>
@endsection
