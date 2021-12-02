<?php
require_once 'bottom_form_base.php';
insertBottom1();
?>
    <script>
        let valida = new ValidaPaginas();
        console.log(valida.validadores);
        valida.actualizar('clave', function(o) {
            o.validador = valida.disjoin([
                o.validador,
                valida.validadorVacio
            ]);
            return o;
        });
        console.log(valida.validadores);
        valida.magia();
    </script>
<?php
insertBottom2();