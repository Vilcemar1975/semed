{{-- @include('js.menuchave',[
    'idmenu' => "",
    'dropdown' => "",
]) --}}


<script>
    /* #idbody id do body*/
    var idmenu = "<?php echo $idmenu ?>"
    var idbody = "<?php echo $idbody ?>"

    var menu = document.getElementById(idmenu);
    var divs = menu.querySelectorAll('div');
    var icos = menu.querySelectorAll('path');

    function AbrirMenu(idicon, iddrop) {

        var ico = document.getElementById(idicon);
        var drop = document.getElementById(iddrop);

        if (drop.style.display == "none") {
            drop.style.display = 'block';
            setas(ico, true);
        } else {
            drop.style.display = 'none';
            setas(ico, false);
        }

        for (let c = 0; c < divs.length; c++) {
            if (divs[c].id != iddrop) {
                divs[c].style.display = "none";
                setas(icos[c], false);
            }
        }

    }

    document.addEventListener('mouseup', function(e) {
    var container = document.getElementById(idbody);
        if (!container.contains(e.target)) {

            for (let c = 0; c < divs.length; c++) {
                divs[c].style.display = "none";
                setas(icos[c], false);
            }

        }
    });

    function setas(seta, fechaouaberto) {

        if (fechaouaberto == true) {
            seta.removeAttribute('d');
            seta.setAttribute('d','M4.5 15.75l7.5-7.5 7.5 7.5');
        } else {
            seta.removeAttribute('d');
            seta.setAttribute('d','M19.5 8.25l-7.5 7.5-7.5-7.5');
        }


        return;
    }

</script>
