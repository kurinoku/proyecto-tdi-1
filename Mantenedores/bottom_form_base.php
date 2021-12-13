<?php

require_once "_init.php";

function insertBottom1() {
    
    kitFontBody();
    bootstrapBody();
    echoScript('util/util.js');
    echoScript('Mantenedores/validacion.js');
}

function insertBottom2() {
    ?>
    <?php
        require('Footer.html');
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="cdn.datatables.net/plug-ins/1.11.3/i18n/es-cl.json"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es-cl.json"
                }
            }); {}
        });
    </script>
    </body>

    </html>

    <?php
}