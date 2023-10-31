{{-- @include('components.botao.bt_modal', ['title' => "", 'txtcor' => "", 'bg' => "", 'modal' => "", 'icon' => ""]) --}}
<button type="button" data-modal-target="{{$modal}}" data-modal-toggle="{{$modal}}"
        class="flex phone:w-[48px] flex-nowrap self-center bg-{{$bg}}-600 hover:bg-{{$bg}}-800 text-{{$txtcor}} py-2 px-5 rounded-md uppercase">
            <i class="{{$icon}}"></i>
            <span class="phone:hidden ">{{ $title ?? "" }}</span>
</button>
