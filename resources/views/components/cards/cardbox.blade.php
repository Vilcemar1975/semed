<div class="faixa-container" style="background-image: url({{ asset('storage/padrao/BACKGROUND.jpg')}})">
    @foreach ($dados as $item)
        <a href="{{ $item['link']}}" class="link-cardbox">
            <div class="faixa-card" style="background-color: {{ $item['color'] }};">
                <h4>{{$item['title']}}</h4>
            </div>
        </a>
    @endforeach
</div>
