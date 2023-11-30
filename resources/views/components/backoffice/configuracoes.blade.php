{{-- @include('components.backoffice.configuracoes', [
    'show_author' =>false,
    'show_day_public' =>false,
    'show_description' =>false,
    'show_url' =>false,
    'show_download' =>false,
    'show_day_alteration' =>false,
    'show_author_photo' =>false,
    'show_shared' =>false,
]) --}}


<div class="block  mt-3 w-full">
    @include('components.backoffice.label',['idname' => 'config','label' => "Configurações"])
    <div class="flex justify-between border border-azul p-3  rounded-lg">
        <div class="">
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_author", 'label' => "Mostra Autor", 'checked' => $show_author])
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_day_public", 'label' => "Mostra Data de Publicação", 'checked' => $show_day_public])
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_description", 'label' => "Mostra Assunto", 'checked' => $show_description])
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_url", 'label' => "Mostra Url", 'checked' => $show_url])
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_print", 'label' => "Mostra Imprimir", 'checked' => $show_print])
        </div>
        <div class="">
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_download", 'label' => "Mostra Botão de Download", 'checked' => $show_download])
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_day_alteration", 'label' => "Mostra Data de Alteração", 'checked' => $show_day_alteration])
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_author_photo", 'label' => "Mostra Autor Fotografia", 'checked' => $show_author_photo])
            @include('components.backoffice.fildcheck_peq', ['idname' => "show_share", 'label' => "Mostra Compartilhamento", 'checked' => $show_share])
        </div>
    </div>
</div>
