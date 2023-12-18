<script>
    $(document).ready(function () {
        $('#diretor').on('input', function () {
            var query = $(this).val();

            if (query.length >= 2) {
                $.ajax({
                    url: '/dash/escola/search-users',
                    type: 'GET',
                    data: { query: query },
                    success: function (data) {
                        displayResults(data);
                    }
                });
            } else {
                $('#searchResults').html('');
            }
        });

        function displayResults(data) {
            var results = $('#searchResults');
            results.html('');

            if (data.length > 0) {
                data.forEach(function (user) {
                    var resultItem = '<p data-uid="' + user.uid + '" class="w-full text-[14pt] text-start py-2 px-2 text-azul-100 font-medium capitalize hover:bg-azul-400" >'+ user.matriculation +' | '+user.name + ' ' + user.lastname + '</p>';

                    results.append(resultItem);
                });

                // Adicionando um ouvinte de evento de clique nos resultados
                $('p[data-uid]').on('click', function () {
                    var selectedUser = $(this);
                    var uid = selectedUser.data('uid');
                    var fullName = selectedUser.text();

                    // Preencher o campo searchInput
                    $('#diretor').val(fullName);

                    // Preencher o campo oculto id_diretor
                    $('#id_diretor').val(uid);

                    // Limpar a div searchResults
                    results.html('');
                });
            } else {
                results.html('<p>Nenhum resultado encontrado.</p>');
            }
        }
    });
</script>
