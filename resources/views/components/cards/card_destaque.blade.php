@forelse ( $dados as $dado)
    @if ($dado['public'] && $dado['destaque'])
        <a href="{{route($dado['route'],['id' => $dado['id']])}}">
            <div class="dest-card">

                @if (empty($dado['img']))
                    <img src="{{asset('storage/padrao/img.jpeg')}}" alt="{{$dado['title']}}" width="60px">
                @else
                    <img src="{{asset('storage/'.$dado['img'])}}" alt="{{$dado['title']}}"  width="60px">
                @endif

                <div class="dest-card-body">
                    <h3>{{$dado['title']}}</h3>
                    <p>{{$dado['texto']}}</p>
                    <div class="dest-card-footer">
                        <i class="fa-regular fa-calendar-days"></i>
                        <p>{{$dado['data']}}</p>
                    </div>
                </div>
            </div>
        </a>
    @endif
    @if ($loop->iteration >= 4 && $dado['public'] && $dado['destaque'])
        @break
    @endif
@empty

@endforelse
