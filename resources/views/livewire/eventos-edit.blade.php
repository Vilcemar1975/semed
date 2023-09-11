<div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
    </div>
    <div class="flex gap-2 justify-between">
        <div class="block text-center mt-2">
            @include('components.backoffice.label',['idname' => 'text','label' => "Imagem"])
            <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[24rem] mx-auto mb-3 rounded-lg">
            <label for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden">
        </div>
        <div class="w-full">
            <div class="mt-2 w-full">
                @include('components.backoffice.label',['idname' => "inicio_date",'label' => "Data e Horário Inicial"])
                <div id="inicio_date_time" class="flex gap-2">
                    <input type="date" name="inicio_date" id="inicio_date" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                    <p class="mt-3 text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                    <input type="time" name="inicio_time" id="inicio_time" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                </div>

                @include('components.backoffice.label',['idname' => "final_date",'label' => "Data e Horário Final"])
                <div id="inicio_date_time" class="flex gap-2">
                    <input type="date" name="inicio_date" id="inicio_date" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                    <p class="mt-3 text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                    <input type="time" name="inicio_time" id="inicio_time" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                </div>
                @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'lista' => []])
            </div>
        </div>
    </div>


    <div class="mt-2">
        @include('components.backoffice.label',['idname' => "textarea_eventos",'label' => "Descrição"])
        <textarea name="textarea_eventos" id="textarea_eventos" class="block w-full min-h-[25rem] max-h-[30rem] border border-azul-100 p-3 rounded-lg overflow-hidden list-padrao-clear"></textarea>
    </div>


    <div class="flex gap-2">
        <div class="block  mt-3 w-full">
            @include('components.backoffice.label',['idname' => 'status','label' => "Status"])
            <div class="block border p-3  rounded-lg border border-azul ">
                @include('components.backoffice.fildratius', ['idid' => "public", 'idname' => "public", 'label' => "Publicar", 'checkted' => false ])
                <div id="public_date_time" class="flex gap-2">
                    @include('components.backoffice.fildratius', ['idid' => "public_day", 'idname' => "public", 'label' => "Publicar no dia ", 'checkted' => false ])
                    <input type="date" name="public_date" id="public_date" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                    <p class="mt-3 text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                    <input type="time" name="public_time" id="public_time" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                </div>
                @include('components.backoffice.fildratius', ['idid' => "no_public", 'idname' => "public", 'label' => "Não Publicar", 'checkted' => true ])
            </div>
        </div>
        <div class="block  mt-3 w-full">
            @include('components.backoffice.label',['idname' => 'config','label' => "Configuração"])
            <div class="flex justify-between border border-azul p-3  rounded-lg">
                <div class="">
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_author", 'label' => "Mostra Autor"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_date_public", 'label' => "Mostra Data de Publicação"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_object", 'label' => "Mostra Assunto"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_url", 'label' => "Mostra Url"])
                </div>
                <div class="">
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_download", 'label' => "Mostra Botão de Download"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_date_alter", 'label' => "Mostra Data de Alteração"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_author_photo", 'label' => "Mostra Autor Fotografia"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_shared", 'label' => "Mostra Compartilhamento"])
                </div>
            </div>
        </div>
    </div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildcheck', ['idname' => "detach", 'label' => "Destacar"])
        @include('components.backoffice.fildselect', ['idname' => "position_spasion", 'label' => "Posição Especial", 'lista' => []])
        @include('components.backoffice.fildselect', ['idname' => "acess", 'label' => "Acesso", 'lista' => []])
    </div>
    <br>
    <!-- footer -->
    <div class="flex flex-wrap gap-2 justify-end">
        @include('components.botao.cinza_a', ["title" => "Cancelar", 'route' => "dashartigo"])
        @include('components.botao.verde', ["title" => "Salvar", 'type' => "submit"])
    </div>
    <br>
</div>









