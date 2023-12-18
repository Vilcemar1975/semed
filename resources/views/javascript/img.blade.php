{{--
    @include('javascript.img',[
        'idpreview' => 'img_preview_edit',
        'idlabel' => 'imglabel_edit',
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
</script>
