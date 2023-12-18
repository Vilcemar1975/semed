<script>
  $(document).ready(function () {
    // Listener para a mudança no input de arquivo
        $('#photos').on('change', function () {
            var fileList = this.files;

            // Verificar se o número total de imagens não excede 4
            if ($('#list_gallery figure').length + fileList.length > 4) {
                alert('Você só pode adicionar no máximo 4 imagens.');
                return;
            }

            // Iterar sobre os arquivos selecionados
            for (var i = 0; i < fileList.length; i++) {
                var file = fileList[i];
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Adicionar a imagem e o input ao div #list_gallery
                    var imageSrc = e.target.result;
                    var galleryItem = $('<figure class="max-w-lg mx-auto">' +
                        '<img class="h-auto max-w-full rounded-lg mx-auto" src="' + imageSrc + '" alt="image description">' +
                        '<button type="button" class="delete-button">Excluir</button>' +
                        '</figure>');

                    $('#list_gallery').append(galleryItem);
                };

                reader.readAsDataURL(file);
            }
        });

        // Listener para excluir imagens
        $('#list_gallery').on('click', '.delete-button', function () {
            $(this).closest('figure').remove();
        });

        // Listener para o envio do formulário
        $('form').submit(function (e) {
            // Adicionar lógica de validação adicional se necessário

            // Impedir o envio do formulário se o número total de imagens for maior que 4
            if ($('#list_gallery figure').length > 4) {
                alert('Você só pode adicionar no máximo 4 imagens.');
                e.preventDefault(); // Impede o envio do formulário
            }
        });
    });
    </script>
