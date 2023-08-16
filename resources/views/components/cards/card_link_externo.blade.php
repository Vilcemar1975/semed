<div class="card_links_externo">
    <h4 class="card_title_link">
        Links Externos
    </h4>
    <hr class="card_title_link_reta">
    @foreach ($dados as $item)
        <a href="{{$item['link']}}">
            <div class="card_body_link">
                <img src="{{asset('storage/'.$item['ico'])}}" alt="">
                <p>{{$item['title']}}</p>
            </div>
        </a>
    @endforeach
</div>
