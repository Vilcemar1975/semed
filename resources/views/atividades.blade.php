@extends('template.app')

@section('title')
    Atividades
@endsection

@section('menu')
    @include('components.menu.menu_pric')
    @include('components.menu.titulo_princ',['title' => "Atividades Educacionais"])

@endsection

@section('subtop')
    <div class="">
        <ul class="flex flex-wrap lg:flex-nowrap justify-center gap-4">
            <li>
                <a class="" href="#">Projetos Educacionais</a>
            </li>
            <li>
                <a href="#">Play Kids</a>
            </li>
            <li>
                <a href="#">Simuladores de Prova</a>
            </li>
            <li>
                <a href="#">Ranking</a>
            </li>
        </ul>
    </div>
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
        <div class="bg-white p-2 mb-5 rounded-lg shadow-lg">
            <div class="flex text-azul-100 text-lg">
                <i class="fa-solid fa-user pt-1"></i>
                <div class="ml-3 font-semibold"> Nome do Aluno</div>
            </div>
            <div class="flex text-azul-100 gap-3">
                <div><b>Pontuação:</b> 100650</div>
                <div><b>Ranking:</b> 1902</div>
            </div>
        </div>
        @include('components.sliders.slider',['dados' => $dados['sliderspreview']])
@endsection

@section('container-slider-bottom')

@endsection

@section('container-faixa')
    <div class="dest-card-contianer">
        @for ($r=0;$r < 3; $r++)
            <a href="#">
                <div class="dest-card">
                    <img src="{{asset('storage/padrao/img.jpeg')}}" alt="">
                    <div class="dest-card-body">
                        <h3>Titulo Destaques</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur. Dolor sit amet dolor sit amet.</p>
                        <div class="dest-card-footer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
                                <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
                            </svg>
                            <p>12/08/2023</p>
                        </div>
                    </div>
                </div>
            </a>
        @endfor
    </div>
    <div class="bg-white shadow-lg p-5 text-azul-100 text-justify mt-5" >
        <h3 class="rotulo-padrao">Quem Somos?</h3>
        <p>
            Conheça e explore o site do Núcleo de Tecnologia Educacional (NTE) da Prefeitura Municipal de Vila Velha. Aqui você encontrará recursos, ferramentas e conteúdos midiáticos, atividades complementares, sugestões para formação continuada, bem como diversas opções para auxiliar os professores e alunos em todas as fases do processo de incorporação e uso das Tecnologias de Informação e Comunicação (TICs) em atividades didático-pedagógicas.
        </p>
        <div class="missao_card_container">

            @include('components.cards.card_colapser',[
                'idcard' => "missao",
                'title' => "Nossa missão",
                'img' => "storage/padrao/img.jpeg",
                'texto' => "Segundo Tajra (2002), o computador é definido dentro do ambiente escolar como uma ferramenta pedagógica capaz de potenciar a aprendizagem de campos conceituais nas diferentes áreas de conhecimento, de introduzir elementos contemporâneos na qualificação profissional e de modernização da gestão escolar. Contudo, o acesso às tecnologias da informação e comunicação não acontece simplesmente com a instalação dos laboratórios de informática, como são chamados na escola, mas pela necessidade de mediação de professores, por meio do desenvolvimento de hábitos e saberes docentes para acessar, trabalhar e interagir com essas tecnologias no cotidiano da escola.
                            O papel do aluno é utilizar o computador como uma ferramenta que contribui para o seu desenvolvimento no momento atual e no futuro. O aluno deixa de ser passivo para se tornar ativo no seu processo ensino aprendizagem. Ele passa a desenvolver competências e habilidades, como ter autonomia, pensar, criar, aprender e pesquisar.
                            Para Valente (2002) a informática contribui como um recurso auxiliar no processo de ensino e aprendizagem, no qual o foco é o aluno. O enfoque da informática educativa não é o computador como objeto de estudo, mas como meio para adquirir conhecimentos., Deve promover a inclusão social e digital. Inclusão digital não pode ser considerada apenas o acesso ao computador ou às redes sociais, a inclusão digital envolve a inclusão social. O acesso às tecnologias pode ser considerado inclusão digital a partir do momento em que o usuário percebe esse instrumento como um aliado na solução dos seus problemas e consegue usá-lo para benefício próprio e do próximo."
            ])

            <div class="missao_total">
                <div class="missao_top" onclick="abrirCardNTE('tecnologia')">
                    <h3>Tecnologia na Educacional</h3>
                    <label for="botao_missao">
                        <i id="ico_tecnologia" class="fa-solid fa-chevron-up fa-rotate-180"></i>
                    </label>
                </div>
                <div id="tecnologia" class="missao_card" style="display:none">
                    <img src="{{asset('storage/padrao/img.jpeg')}}" alt="">
                    <div class="missao_corpo">
                        <ol>
                            <li>Na Tecnologia Educacional</li>
                            <li>O computador como recurso interdisciplinar e gerador de possibilidades e permissões eficientes que interferem no processo ensino-aprendizagem, estimulando o desenvolvimento cognitivo, afetivo e psicomotor do educando como agente construtor de seu conhecimento;</li>
                            <li>As atividades são lúdicas, contextualizadas e organizadas estimulando a investigação, a comunicação e o espírito criativo.</li>
                            <li>Ocorre a viabilização da integração curricular;</li>
                            <li>Habilita para exercício da autonomia;</li>
                            <li>Amplia-se o estímulo à pesquisa e à prática investigativa;</li>
                            <li>Compartilhamento de saberes e frequente;</li>
                            <li>Incentiva a integração entre pais / alunos / professores.</li>
                        </ol>
                    </div>
                </div>
            </div>

            @include('components.cards.card_colapser',[
                'idcard' => "tics",
                'title' => "TIC's",
                'img' => "storage/padrao/img.jpeg",
                'texto' => "O computador, através do uso de software educativo, possibilita o aluno a adquirir conhecimento e domínio sobre diversos assuntos, inclusive facilitando a aprendizagem de conteúdos que, de outra forma, teria mais dificuldades em assimilar.
A tecnologia educacional busca atender aos objetivos educacionais previamente estabelecido visando aspectos pedagógicos e sociais na utilização da informática na aprendizagem.",
            ])

        </div>
    </div>

    {{-- <a href="#">
                <div class="video_card" style="background-image: url({{asset('storage/padrao/videos_2.png')}})">
                    <div class="video_corpo">
                        <h3>Titulo</h3>
                        <p>descricao</p>
                    </div>
                </div>
            </a> --}}

    {{-- Todos os videos --}}
    <div class="contaniner-padrao">
        <h3 class="rotulo-padrao">Eventos NTE</h3>
        <div class="list-padrao">
            @for ($h=0;$h < 10;$h++)
                @include('components.cards.card_videos', [
                    'idvideo' => "",
                    'img' => "storage/padrao/img.jpeg",
                    'title' => "Titulo",
                    'texto' => "busca atender aos objetivos educacionais previamente estabelecido visando aspectos pedagógicos e sociais",
                ])
            @endfor
        </div>
    </div>
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
