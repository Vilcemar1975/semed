<div>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="perfil-tab" data-tabs-target="#perfil" type="button" role="tab" aria-controls="perfil" aria-selected="false">Perfil</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="job-tab" data-tabs-target="#job" type="button" role="tab" aria-controls="job" aria-selected="false">Funcionário</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="studante-tab" data-tabs-target="#studante" type="button" role="tab" aria-controls="studante" aria-selected="false">Estudante</button>
            </li>
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="andress-tab" data-tabs-target="#andress" type="button" role="tab" aria-controls="andress" aria-selected="false">Endereço</button>
            </li>
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="protection-tab" data-tabs-target="#protection" type="button" role="tab" aria-controls="protection" aria-selected="false">Segurança</button>
            </li>
        </ul>
    </div>
    <div id="myTabContent">
        {{-- Perfil --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
            <div class="flex gap-3 justify-center ">
                <div class="border rounded-lg">
                    <label for="img_avatar border-3 rounded-lg">
                        <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" name="img_preview" class="w-[160px] h-[150px] rounded-lg">
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
            <div class="mt-8 text-end">
                <button type="button" class="py-2 px-3 text-white bg-green-600 hover:bg-green-900 rounded-md"><i class="fa-regular fa-floppy-disk"></i></button>
            </div>
        </div>
        {{-- Funcionário --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="job" role="tabpanel" aria-labelledby="job-tab">
            @include('components.backoffice.subtitle',['title' => "Funcionário"])
            <div class="flex gap-2 justify-center">
                @include('components.backoffice.fildText', ['idname' => "role", 'label' => "Cargo", 'max' => 0 , 'min' => 0])
                @include('components.backoffice.fildText', ['idname' => "frame", 'label' => "Quadro", 'max' => 0 , 'min' => 0])
                @include('components.backoffice.fildText', ['idname' => "lotacao", 'label' => "lotacao", 'max' => 0 , 'min' => 0])
            </div>
            <div class="mt-8 text-end">
                <button type="button" class="py-2 px-3 text-white bg-green-600 hover:bg-green-900 rounded-md"><i class="fa-regular fa-floppy-disk"></i></button>
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="studante" role="tabpanel" aria-labelledby="studante-tab">
            @include('components.backoffice.subtitle',['title' => "Aluno"])
            <div class="flex gap-2 justify-center">
                @include('components.backoffice.fildselect', ['idname' => "scool", 'label' => "Escola", 'lista' => []])
                <div class="flex gap-2">
                    @include('components.backoffice.fildText', ['idname' => "serie", 'label' => "serie", 'max' => 0 , 'min' => 0])
                    @include('components.backoffice.fildText', ['idname' => "room", 'label' => "Sala", 'max' => 0 , 'min' => 0])
                </div>
            </div>
            <div class="mt-8 text-end">
                <button type="button" class="py-2 px-3 text-white bg-green-600 hover:bg-green-900 rounded-md"><i class="fa-regular fa-floppy-disk"></i></button>
            </div>
        </div>
        {{-- Endereço --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="andress" role="tabpanel" aria-labelledby="andress-tab">
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
                <div class="w-full"></div>
            </div>
            <div class="mt-8 text-end">
                <button type="button" class="py-2 px-3 text-white bg-green-600 hover:bg-green-900 rounded-md"><i class="fa-regular fa-floppy-disk"></i></button>
            </div>

        </div>
        {{-- Segurança --}}
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="protection" role="tabpanel" aria-labelledby="protection-tab">
            <div class="flex gap-2 justify-center mb-3">
                <div class="flex gap-2">
                    @include('components.backoffice.fildText', ['idname' => "password", 'label' => "Senha", 'max' => 0 , 'min' => 0, 'type' => "password"])
                    @include('components.backoffice.fildText', ['idname' => "password_confirm", 'label' => "Confirmar Senha", 'max' => 0 , 'min' => 0, 'type' => "password"])
                </div>
                <div class="mt-8 text-end">
                    <button type="button" class="py-2 px-3 text-white bg-green-600 hover:bg-green-900 rounded-md"><i class="fa-regular fa-floppy-disk"></i></button>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>
<br>
