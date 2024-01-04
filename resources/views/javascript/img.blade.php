{{--
    @include('javascript.img',[
        'idpreview' => 'img_preview_edit',
        'idlabel' => 'imglabel_edit',
        'uidschool' => '$escola->uid ',
        'uidimg' => '$logo['uid']',
        'logo' => false,
    ])
     --}}
<script>
    function previewImage(input) {
        let idpreview = '<?php echo $idpreview ; ?>';
        let idlabel = '<?php echo $idlabel ; ?>';

        var imgPreview = document.getElementById(idpreview);
        var imgLabel = document.getElementById(idlabel);

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgPreview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);

            imgLabel.innerText = 'Imagem selecionada';
        } else {
            imgPreview.src = "{{ asset('storage/padrao/img.jpeg') }}";
            imgLabel.innerText = 'Selecione a Imagem';
        }

    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            const input_uidschool = '<?php echo $uidschool ; ?>';
            let input_uidimg = "<?php echo $uidimg; ?>";
            const input_logo = "<?php echo $logo; ?>";

            reader.onload = function (e) {
                $('#img_preview').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);

            /* var uidimg_input = document.getElementById('uidimg_input').value;
            console.log(uidimg_input);
            if (uidimg_input != "") {
                input_uidimg = uidimg_input;
            } */

            // Obtenha os dados do formulário
            var formData = new FormData();
            formData.append('uidschool', input_uidschool);
            formData.append('uidimg', input_uidimg);
            formData.append('logo', input_logo);
            formData.append('image', input.files[0]);

            //Tokem
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Faça a solicitação AJAX
            $.ajax({
                url: '/dash/img/saveoneimgscholl',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                        'X-CSRF-TOKEN': csrfToken
                },
                success: function (data) {
                    //console.log('Imagem enviada com sucesso:', data);


                },
                error: function (error) {
                    console.error('Erro ao enviar imagem:', error);
                }
            });
        }
    }
</script>
