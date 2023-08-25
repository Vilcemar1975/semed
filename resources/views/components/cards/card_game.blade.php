@forelse ( $dados as $dado)
    @if ($dado['public'] && $dado['destaque'])

        <div class="card_game_container">
            <div class="card_game" style="background-image: url(
                @if (empty($dado['img']))
                {{asset('storage/padrao/img.jpeg')}}
                @else
                {{asset('storage/'.$dado['img'])}}
                @endif
            )">
                <div class="card_game-body">
                    <h3>{{$dado['title']}}</h3>
                    <p>{{$dado['texto']}}</p>
                </div>
            </div>
            <a href="{{route($dado['route'],['id' => $dado['id']])}}">
                <i class="fa-regular fa-circle-play"></i>
            </a>
        </div>

    @endif
    @if ($loop->iteration >= 4 && $dado['public'] && $dado['destaque'])
        @break
    @endif
@empty

@endforelse
