<form id="form_materia" action="#" method="get">
    @csrf
    <div class="search-category">
        <label>{{$title ?? "Pesquisar"}}</label>
        <select name="materia" id="materia" onchange="submitForm('form_materia')" aria-placeholder="Matéria">

            @forelse ($dados as $materia )
                <option value="{{$materia['id']}}">{{$materia['name']}}</option>
            @empty
                <option value="">Nenhuma matéria cadastrada</option>
            @endforelse
        </select>

    </div>
</form>
