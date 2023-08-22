{{--  @include('components.cards.card_videos', [
        'idvideo' => "",
        'img' => "",
        'title' => "",
        'texto' => "",
    ]) --}}
<a href="#">
    <div class="video_card" style="background-image: url({{asset($img)}})">
        <div class="video_corpo">
            <h3>{{$title}}</h3>
            <p>{{$texto}}</p>
        </div>
    </div>
</a>
