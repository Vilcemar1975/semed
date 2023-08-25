@extends('template.app')

@section('title')
    Tutoriais
@endsection

@section('menu')
    @include('components.menu.menu_pric')
    @include('components.menu.titulo_princ',['title' => "Tutoriais"])
@endsection
@section('subtop')
    @include('components.pesquisa_materias', ['title' => "Lista de Tutoriais",'dados' => $dados['materias']])
    <br>
@endsection
@section('container-left')
    {{-- @include('components.cards.card_destaques_peq') --}}
    @include('components.menu.menu_topicos')
@endsection

@section('container-right')
    @include('components.cards.card_ultmas_noticias_peq',['title' => "Ultimos Tutoriais",'dados' => $dados['ultimaNoticias']])

@endsection

@section('container-slider')
        @include('components.site_track')
        @include('components.sliders.slider',['dados' => $dados['sliderspreview']])
@endsection

@section('container-slider-bottom')

@endsection

@section('container-faixa')
    <div class="bg-white shadow-lg p-3 text-azul-100 text-justify mt-5" >
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
    @include('components.cards.card_news', ['title' => "Escolas da Rede", 'dados' => $dados['ultimaNoticias']])

    <div class="faixa-prime">
        @include('components.cards.cardbox',['dados' => $dados['cardBox']])
        @include('components.cards.card_link_externo',['dados' => $dados['linksExternos']])
    </div>

    <div class="contaniner-padrao">
        <h3 class="rotulo-padrao">Projeto e Eventos nas Escolar</h3>
        <p class="subrotulo-padrao">Projetos Realizados em escolas da rede.</p>
        <div class="list-padrao pt-5">
            @for ($h=0;$h < 10;$h++)
            @include('components.cards.card_livros_tutorial',['dados' => $dados['ultimaNoticias']])
                {{-- @include('components.cards.card_livros', [
                    'idLivro' => "",
                    'img' => "storage/padrao/img.jpeg",
                    'title' => "Titulo",
                    'texto' => "busca atender aos objetivos educacionais previamente estabelecido visando aspectos pedagógicos e sociais",
                ]) --}}
            @endfor
        </div>
    </div>
    <br>
    {{-- Datas comemorativas --}}
    <div class="contaniner-padrao" style="background-color: #76a7fc7e;">
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
    <br>

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
