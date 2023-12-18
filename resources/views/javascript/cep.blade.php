{{-- @include('javascript.cep') --}}



<script>

    //envento que pega o conteudo do campo cep e inicializa a função pesquisacep(value)
    document.querySelector('#cep').addEventListener('blur', function(){
        var cep = document.querySelector('#cep').value;
        pesquisacep(cep);
    });




    let street = document.getElementById('street');
    let number = document.getElementById('number');
    let complement  = document.getElementById('complement');
    let district  = document.getElementById('district');
    let city  = document.getElementById('city');
    let state  = document.getElementById('state');
    let country  = document.getElementById('country');
    let ibge  = document.getElementById('ibge');
    let gia  = document.getElementById('gia');
    let ddd  = document.getElementById('ddd');
    let siafi  = document.getElementById('siafi');

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            street.value=("");
            number.value=("");
            complement.value=("");
            district.value=("");
            city.value=("");
            state.value=("");
            //country.value=("");
            ibge.value=("");
            gia.value=("");
            ddd.value=("");
            siafi.value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            street.value=(conteudo.logradouro);
            //number.value=("");
            complement.value=(conteudo.complemento);
            district.value=(conteudo.bairro);
            city.value=(conteudo.localidade);
            state.value=(conteudo.uf);
            //country.value=("");
            ibge.value=(conteudo.ibge);
            gia.value=(conteudo.gia);
            ddd.value=(conteudo.ddd);
            siafi.value=(conteudo.siafi);

        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                street.value=("...");
                number.value=("...");
                complement.value=("...");
                district.value=("...");
                city.value=("...");
                state.value=("...");
                //country.value=("...");
                ibge.value=("...");
                gia.value=("...");
                ddd.value=("...");
                siafi.value=("...");


                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

</script>
