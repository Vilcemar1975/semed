
<script>
    $(document).ready(function(){

        // Evento que é acionado quando o valor do campo 'estrutura' muda
        $('#estrutura').change(function(){
            // Obtém o valor selecionado
            //var estruturaValue = $(this).val();
            var estruturaText = $(this).find(":selected").text();

            // Verifica se o texto está vazio
            if (estruturaText.trim() === '') {
                // Se estiver vazio, interrompe o processo
                return;
            }

            // Verifica se o texto já existe na lista antes de adicionar
            if ($('#list_inputs').find('label:contains("' + estruturaText + '")').length > 0) {
                // Se já existe, interrompe o processo
                return;
            }

            // Cria um input hidden com o valor selecionado
            var hiddenInput = $('<input>').attr({
                type: 'hidden',
                name: 'estrutura_hidden[]', // Utilize colchetes para enviar um array ao servidor
                value: estruturaText
            });

            // Cria um label associado ao input e adiciona uma classe
            var label = $('<label>').addClass('text-[12pt] text-azul-100').text(estruturaText);
            var kitImput = $('<div>').addClass('flex gap-2 px-3 py-2 mt-3 bg-blue-100 hover:bg-blue-200 border border-azul-100 rounded-md');

            // Cria um botão de exclusão
            var deleteButton = $('<button>').addClass('text-[12pt] text-azul-100 hover:font-bold').text('X').on('click', function(){
                // Ao clicar no botão de exclusão, remove o input, o label e o botão
                hiddenInput.remove();
                label.remove();
                deleteButton.remove();
                kitImput.remove();
            });

            kitImput.append(hiddenInput, label, deleteButton);


            // Adiciona o input, o label e o botão de exclusão ao elemento com o id 'list_inputs'
            $('#list_inputs').append(kitImput);
        });


    });

    $(document).ready(function(){
        // Array de dados em PHP (supondo que seja uma array simples)
        var dadosEstruturaJSON  = <?php echo json_encode($escola->structure); ?>;

        // Converte a string JSON para um array JavaScript
        var dadosEstrutura = JSON.parse(dadosEstruturaJSON);

        // Itera sobre o array em JavaScript
        dadosEstrutura.forEach(function(value){
            // Cria um input hidden com o valor do array
            var hiddenInput = $('<input>').attr({
                type: 'hidden',
                name: 'estrutura_hidden[]',
                value: value
            });

            // Cria um label associado ao input e adiciona uma classe
            var label = $('<label>').addClass('text-[12pt] text-azul-100').text(value);
            var kitImput = $('<div>').addClass('flex gap-2 px-3 py-2 mt-3 bg-blue-100 hover:bg-blue-200 border border-azul-100 rounded-md');

            // Cria um botão de exclusão
            var deleteButton = $('<button>').addClass('text-[12pt] text-azul-100 hover:font-bold').text('X').on('click', function(){
                // Ao clicar no botão de exclusão, remove o input, o label e o botão
                hiddenInput.remove();
                label.remove();
                deleteButton.remove();
                kitImput.remove();
            });

            kitImput.append(hiddenInput, label, deleteButton);

            // Adiciona o input, o label e o botão de exclusão ao elemento com o id 'list_inputs'
            $('#list_inputs').append(kitImput);
        });
    });
</script>




