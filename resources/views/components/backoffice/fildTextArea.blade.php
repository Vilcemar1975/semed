@include('components.backoffice.label',['idname' => 'descricao','label' => "Descrição"])
<textarea name="descrition" id="descrition" class="w-full min-h-[12rem] border border-azul-100 rounded-lg" onkeyup="limite_textarea(this.value)"></textarea>
<p id="cont" class="text-[9pt] text-gray-500">Descrição deve ter no maximo 300 caracter.</p>

<script>
    function limite_textarea(valor) {
        quant = 300;
        total = valor.length;
        if(total <= quant) {
            resto = quant - total;
            document.getElementById('cont').innerHTML = "Descrição deve ter no maximo 300 caracter. Restantes: "+resto;
        } else {
            document.getElementById('texto').value = +valor.substr(0,quant);
        }
    }
</script>
