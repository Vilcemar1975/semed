<script>
      $(document).ready(function() {
        // Função para verificar se a div #list_gallery possui elementos
        function checkImageList() {
        var imageList = $('#list_gallery').find('figure');
        var saveButton = $('#saveButton');

        // Habilita o botão se houver elementos na lista, caso contrário, desabilita
        saveButton.prop('disabled', imageList.length === 0);
        }

        // Chama a função inicialmente para configurar o estado do botão
        checkImageList();

        // Adiciona um observador de mutação para detectar mudanças na div #list_gallery
        var observer = new MutationObserver(checkImageList);
        var targetNode = document.getElementById('list_gallery');

        // Configurações do observador
        var config = { childList: true };

        // Inicia a observação da div #list_gallery
        observer.observe(targetNode, config);
    });

    $(document).ready(function () {
        // Listener para a mudança no input de arquivo
        $('#photos').on('change', function () {
            var fileList = this.files;
            var imagesGal = <?php echo (int) $galleriesCount ?>;
            var contar = $('#list_gallery figure').length + fileList.length + imagesGal;

            if (fileList.length == 0) {
                alert('Você só pode adicionar no máximo 10 imagens.');
                return;
            }

            // Verificar se o número total de imagens não excede 10
            if (contar > 10) {
                alert('Você só pode adicionar no máximo 10 imagens.');
                return;
            }

            // Iterar sobre os arquivos selecionados
            for (var i = 0; i < fileList.length; i++) {
                var file = fileList[i];
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Adicionar a imagem e o input ao div #list_gallery
                    var imageSrc = e.target.result;
                    var galleryItem = $('<figure class="max-w-[18rem] mx-auto">' +
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
            if ($('#list_gallery figure').length > 10) {
                alert('Você só pode adicionar no máximo 10 imagens.');
                e.preventDefault(); // Impede o envio do formulário
            }
        });

    });

    $(document).ready(function() {
        // Função para preencher o modal com os dados do objeto

        function preencherModal(dados) {

            $('#uid_img').val(dados.image.uid);
            $('#title_img').val(dados.image.title);
            $('#author_img').val(dados.autor.name + ' '+ dados.autor.lastname);
            $('#uid_author_img').val(dados.autor.uid);
            $('#category_img').val(dados.image.type);
            $('#classification_img').val(dados.image.classification);
            $('#source_img').val(dados.image.source);
            $('#description_img').val(dados.image.description);

            //Criar form com a routa e o uid
            let uid = dados.image.uid;
            let uidimg = "{{ route('delimg', ['uid' => 'UID']) }}".replace('UID', uid);
            $("#frmDelete").attr("action", uidimg);

            let img = dados.image.url;
            if (img == null) {
                img = "{{asset('storage/padrao/img.jpeg')}}";
            }

            let imagem = "{{asset('IMG')}}".replace('IMG', img);
            $('#previw_img').attr('src', imagem);

        }

        // Manipule o clique no botão para abrir o modal
        $('.botoaGaleriaEdit').on('click', function() {
            var uid = $(this).data('uid');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Faça a solicitação AJAX para obter os dados da imagem
            $.ajax({
                type: 'POST',
                url: '/dash/img/search/' + uid,
                headers: {
                        'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {

                // Verifique se a resposta contém dados válidos
                if (response && response.length > 0) {
                    // Preencha o modal com os dados obtidos
                    preencherModal(JSON.parse(response));

                    // Abra o modal
                    $('#EditorImgModal').removeClass('hidden');
                } else {
                    // Trate o caso em que nenhum dado foi retornado
                    console.error('Nenhum dado retornado da rota /dash/search/' + uid);
                }
                    },
                    error: function(error) {
                        // Manipule os erros aqui
                        console.error('Erro na solicitação AJAX:', error);
                    }
                });
            });

            // Manipule o clique no botão "Cancelar" dentro do modal
            $('#EditorImgModal').on('click', '[data-modal-hide="EditorImgModal"]', function() {
            // Feche o modal
            $('#EditorImgModal').addClass('hidden');
        });

        // Manipule o clique no botão para excluir o modal
        $('.botoaGaleriaExcluir').on('click', function() {
            var uid = $(this).data('uidel');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Faça a solicitação AJAX para obter os dados da imagem
            $.ajax({
                type: 'GET',
                url: '/dash/img/erase/' + uid,
                headers: {
                        'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {

                // Verifique se a resposta contém dados válidos
                if (response) {

                    // Listener para excluir imagens
                    $('#list_img_galleries').on('click', '.botoaGaleriaExcluir', function () {
                        $(this).closest('figure').remove();
                    });


                } else {

                    // Trate o caso em que nenhum dado foi retornado
                    console.error('Nenhum dado retornado da rota /dash/search/' + uid);

                }
                    },
                    error: function(error) {
                        // Manipule os erros aqui
                        console.error('Erro na solicitação AJAX:', error);
                    }
                });
            });


        });

</script>
