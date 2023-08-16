<div id="sliderx">
    <div class="gallery autoplay items-3">

        {{-- <div id="item-1" class="control-operator"></div>
        <div id="item-2" class="control-operator"></div>
        <div id="item-3" class="control-operator"></div> --}}
        @foreach ( $dados as $slider )
            <div id="item-{{ $loop->index+1 }}" class="control-operator"></div>
        @endforeach

        @foreach ( $dados as $slider )
            <figure class="item">
                <h1><img src="{{asset('storage/'.$slider['img'])}}"></h1>
                <div class="title-item">
                    <h6>{{$slider['data']}}</h6>
                    <p>{{$slider['title']}}</p>
                </div>
                <div class="caixa-preta"></div>
            </figure>
        @endforeach

        {{-- <figure class="item">
            <h1><img src="{{asset('storage/'.$dados[img])}}"></h1>
            <div class="title-item">
                <h6>data1</h6>
                <p>Teste1</p>
            </div>
            <div class="caixa-preta"></div>
        </figure> --}}

        {{-- <figure class="item">
                <h1><img src="{{asset('storage/slider/slider-2.jpg')}}"></h1>
                <div class="title-item">
                    <h6>data1</h6>
                    <p>Teste1</p>
                </div>
                <div class="caixa-preta"></div>
        </figure>

        <figure class="item">
            <h1><img src="{{asset('storage/slider/slider-3.jpg')}}"></h1>
            <div class="title-item">
                <h6>data1</h6>
                <p>Teste1</p>
            </div>
            <div class="caixa-preta"></div>
        </figure> --}}

        <div class="controls">
            @foreach ( $dados as $slider )
                <a href="#item-{{ $loop->index+1 }}" class="control-button">.</a>
            @endforeach
            {{-- <a href="#item-1" class="control-button">.</a>
            <a href="#item-2" class="control-button">.</a>
            <a href="#item-3" class="control-button">.</a> --}}
        </div>


    </div>

</div>


