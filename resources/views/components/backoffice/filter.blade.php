<div id="div_filtro" class="w-full p-3 border-azul-100 bg-azul-400 rounded-lg mt-2" style="display: none;">
    <h3 class="text-[10pt] p-0 m-0 text-azul-100 font-semibold uppercase">Filtro</h3>
    <div class="flex gap-2">
        @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'lista' => []])
        @include('components.backoffice.fildDate', ['idname' => "date_criacao", 'label' => "Data Criação"])
        @include('components.backoffice.fildDate', ['idname' => "date_publicao", 'label' => "Data Criação"])
    </div>
</div>
<script>
    function filtro() {
        var div = document.getElementById('div_filtro');
        var botao = document.getElementById('button_filtro');
        if (div.style.display == "block") {
            div.style.display = "none";
            botao.setAttribute('class', "block hover:bg-azul-400 bg-azul hover:text-azul-100 text-white uppercase text-[12pt] px-3 py-2 rounded-md");
        }else{
            div.style.display = "block";
            botao.setAttribute('class', "block bg-azul-400 hover:bg-azul hover:text-azul-100 text-white uppercase text-[12pt] px-3 py-2 rounded-md");
        }
        console.log(botao.getAttribute('class'));
    }
</script>
