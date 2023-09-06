@extends('template.app')

@section('title')
    Secretaria da Educação
@endsection

@section('menu')
    @include('components.menu.menu_pric')
    @include('components.menu.titulo_princ',['title' => "Secretária de Educação"])
@endsection

@section('container-left')

@endsection

@section('container-right')
{{-- \ --}}


@endsection

@section('container-slider')

@endsection

@section('container-slider-bottom')

@endsection

@section('container-faixa')

    {{-- <div class="block p-5"></div> --}}

    <div class="block m-auto text-azul-100 mb-6 p-5 w-[100%] lg:w-[72%]">
        <h3 class="block text-[20pt] text-center pb-2 mt-4 uppercase font-semibold text-azul-100 border-b-2">Sobre a Secretaria</h3>
        <p class="text-[10pt] text-justify ">
            A Secretaria Municipal de Educação de Vila Velha – SEMED é responsável por organizar, desenvolver e manter o Sistema Municipal de Ensino nos seguintes segmentos: Educação Infantil, do Ensino Fundamental (1° ao 9° ano) e da Educação de Jovens e Adultos (EJA). Além disso, cabe à SEMED integralizar politicas e planos educacionais da União e do Estado nos termos da Lei de Diretrizes e Base da Educação Nacional (LDB nº 9.394/1996). A Rede possui 109 escolas, sendo 40 Unidades de Educação Infantil (UMEIs); 67 Unidades de Educação Fundamental (UMEFs) e 02 Unidades de Educação Infantil e Ensino Fundamental (UMEIFs). Com cerca de 5.800 mil profissionais da Educação (magistério e administrativo), a Secretaria atende cerca de 55.300 estudantes. A Secretaria Municipal de Educação tem como missão garantir à população um ensino público gratuito com equidade e qualidade, assegurando-lhe a universalização do acesso, da permanência, da aprendizagem significativa e da formação integral, ou seja, estimulando o desenvolvimento dos estudantes na sua totalidade e potencialidade visando o pleno exercício da cidadania.
        </p><br>
        <label for="" class="text-[10pt] uppercase font-medium">Endereço</label>
        <p class="text-[10pt] text-justify ">
            Rua Castelo Branco, n° 1803, Centro, CEP 29100-041.
        </p>
    </div>

    <div class="flex flex-wrap lg:flex-nowrap justify-center text-azul-100 gap-3 p-5">
        <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" class="w-[100%] lg:w-[20rem] lg:h-[16rem]">
        <div class=" lg:w-[40rem]">
            <h3 class="text-[18pt] font-semibold">Adriana Chagas Meireles</h3>
            <label for="" class="text-[10pt] uppercase font-medium">Descrição</label>
            <p class="text-[10pt] text-justify ">
                Graduada em Pedagogia e pós-graduada em Gestão Escolar, mestre em Ciências da Educação, pedagoga e professora de séries iniciais, Adriana Chagas Meireles atuou na função de Diretora Escolar por 12 anos, foi Assessora Parlamentar na Câmara Municipal de Vila Velha por 05 anos, atuou como conselheira do Fundeb no segmento diretores por 02 mandatos, atuou como Vice-Presidente do Fórum dos diretores de Vila Velha e exerce, ativamente, o cargo de servidora pública desde 2007, assumindo, em 2020, o cargo de Secretária Executiva da Secretaria de Educação do Município de Vila Velha.
            </p>
            <div class="block text-[12pt] font-medium mt-5">
                <div class="flex gap-2">
                    <i class="fa-solid fa-envelope p-1"></i>
                    <p>adrianazurlo@edu.vilavelha.es.gov.br</p>
                </div>
                <div class="flex gap-2">
                    <i class="fa-solid fa-phone p-1"></i>
                    <p>(27) 3389-7018</p>
                </div>

            </div>
        </div>
    </div>
    <h3 class="block text-[20pt] text-center pb-2 mt-4 uppercase font-semibold text-azul-100 border-b-2">Nossa Equipe</h3>
    <div class="flex flex-wrap justify-around">
        @for ($g=0; $g < 10;$g++)
            <a href="#">
                <div class="block bg-white w-[24rem] m-3 rounded-lg shadow-lg hover:scale-110">
                    <div class="flex gap-2">
                        <img src="{{ asset('storage/padrao/img.jpeg')}}" alt="" class="block w-[10rem] h-[5rem] rounded-tl-lg rounded-bl-lg  basis-[40%]">
                        <div class="block basis-[60%]">
                            <h3 class="text-[12pt] text-azul-100 font-medium">Nome do Usuário</h3>
                            <p class="text-[10pt] text-azul-100 font-medium">Cargo do Funcionário</p>
                        </div>
                    </div>
                </div>
            </a>
        @endfor
    </div>

@endsection

@section('footer')
    @include('components.footer.menu_footer')
    @include('components.footer.logo_footer')
@endsection
