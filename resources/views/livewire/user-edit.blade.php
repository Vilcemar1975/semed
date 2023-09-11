<div class="block w-full mt-2">
    <div class="bg-blue-100 p-3 mt-3 rounded-lg">

    <div class="flex gap-2 justify-center ">
        <div class="border">
            <label for="img_avatar border-3">
                <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" name="img_preview" class="w-[160px] h-[150px]">
            </label>
            <input type="file" name="img_avatar" id="img_avatar" class="hidden">
        </div>
        <div class="block w-full">
            <div class="flex gap-2 w-full">
                @include('components.backoffice.fildText', ['idname' => "name", 'label' => "Nome", 'max' => 0 , 'min' => 0])
                @include('components.backoffice.fildText', ['idname' => "lastname", 'label' => "Sobrenome", 'max' => 0 , 'min' => 0])
                
            </div>
            <div class="flex gap-2 w-full ">
                @include('components.backoffice.fildText', ['idname' => "registration", 'label' => "Matricula", 'max' => 0 , 'min' => 0])
                <div class="mt-2">
                    @include('components.backoffice.label',['idname' => 'birth_date','label' => "Nascimento"])
                    <input type="date" name="birth_date" id="birth_date" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt] w-full">
                </div>
                @include('components.backoffice.fildselect', ['idname' => "group", 'label' => "Grupo", 'lista' => []])
            </div>
        </div>
    </div>
    <div class="flex gap-2 justify-center ">
        @include('components.backoffice.fildText', ['idname' => "cpf", 'label' => "CPF", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildText', ['idname' => "email", 'label' => "E-mail", 'max' => 0 , 'min' => 0, 'type' => "email"])
    </div>
    <div class="flex gap-2 justify-center ">
        @include('components.backoffice.fildText', ['idname' => "tel", 'label' => "Telefone", 'max' => 0 , 'min' => 0 , 'type' => "tel"])
        @include('components.backoffice.fildText', ['idname' => "phone", 'label' => "Celular", 'max' => 0 , 'min' => 0, 'type' => "tel"])
    </div>
    </div>
 
    <div class="bg-blue-100 p-3 mt-3 rounded-lg">
    @include('components.backoffice.subtitle',['title' => "Funcionário"])
    <div class="flex gap-2 justify-center">
        @include('components.backoffice.fildText', ['idname' => "role", 'label' => "Cargo", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildText', ['idname' => "frame", 'label' => "Quadro", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildText', ['idname' => "lotacao", 'label' => "lotacao", 'max' => 0 , 'min' => 0])
    </div>
    </div>

    <div class="bg-blue-100 p-3 mt-3 rounded-lg">
    @include('components.backoffice.subtitle',['title' => "Aluno"])
    <div class="flex gap-2 justify-center">
        @include('components.backoffice.fildselect', ['idname' => "scool", 'label' => "Escola", 'lista' => []])
        <div class="flex gap-2">
            @include('components.backoffice.fildText', ['idname' => "serie", 'label' => "serie", 'max' => 0 , 'min' => 0])
            @include('components.backoffice.fildText', ['idname' => "room", 'label' => "Sala", 'max' => 0 , 'min' => 0])
        </div>
    </div>
    </div>

    <div class="bg-blue-100 p-3 mt-3 rounded-lg">
    @include('components.backoffice.subtitle',['title' => "Endereço"])
    <div class="flex gap-2 justify-center mb-3">
        <div class="w-[30%]">
            @include('components.backoffice.fildText', ['idname' => "cep", 'label' => "CEP", 'max' => 11 , 'min' => 0])
        </div>
        @include('components.backoffice.fildText', ['idname' => "logradouro", 'label' => "Logradouro", 'max' => 0 , 'min' => 0])
    </div>
    <div class="flex gap-2 justify-center mb-3">
        <div class="w-[30%]">
            @include('components.backoffice.fildText', ['idname' => "numero", 'label' => "numero", 'max' => 0 , 'min' => 0, 'type' => "number"])
        </div>
        @include('components.backoffice.fildText', ['idname' => "complemento", 'label' => "Complemento", 'max' => 0 , 'min' => 0])
    </div>
    <div class="flex gap-2 justify-center mb-3">
        @include('components.backoffice.fildText', ['idname' => "cidade", 'label' => "Bairro", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildText', ['idname' => "cidade", 'label' => "Cidade", 'max' => 0 , 'min' => 0])
    </div>
    <div class="flex gap-2 justify-center mb-3">
        @include('components.backoffice.fildText', ['idname' => "uf", 'label' => "UF", 'max' => 2 , 'min' => 0])
        @include('components.backoffice.fildText', ['idname' => "uf", 'label' => "Pais", 'max' => 0 , 'min' => 0, 'value' => "Brasil"])

    </div>
    </div>
    <div class="bg-green-100 p-3 mt-3 rounded-lg">
    
    @include('components.backoffice.subtitle',['title' => "Segurança"])
    <div class="flex gap-2 justify-center mb-3">
        <div class="flex gap-2">
            @include('components.backoffice.fildText', ['idname' => "password", 'label' => "Senha", 'max' => 0 , 'min' => 0, 'type' => "password"])
            @include('components.backoffice.fildText', ['idname' => "password_confirm", 'label' => "Confirmar Senha", 'max' => 0 , 'min' => 0, 'type' => "password"])
        </div>
    </div>
    </div>
    <hr>
    <div class="flex justify-end mt-3">
        @include('components.botao.cinza_a', ["title" => "Voltar", 'route' => "dashusuarios"])
    </div>
</div>
<br>