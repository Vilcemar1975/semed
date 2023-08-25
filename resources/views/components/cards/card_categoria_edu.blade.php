<div id="card-materias">
    <p class="rotulo">Materias</p>
    <div class="card-materias-container">
        @if (!empty($materias))
            <ul>
                @foreach ( $materias as $materia)
                    <li>
                        <a href="#">{{ $materia['name']}}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
