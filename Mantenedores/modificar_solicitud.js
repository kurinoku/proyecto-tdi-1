(function() {
    "use strict";

    let currentId = -1;

    function makeUpdateModal(req, currentId) {
        return function(evt) {
            updateModal(req.response, currentId);
        };
    }

    function requestUpdate() {
        let req = new XMLHttpRequest();
        let data = new FormData();
        data.append('codigo', currentId);
        req.onload = makeUpdateModal(req, currentId);
        req.responseType = 'json';
        
        req.open("POST", "actualizar_solicitud_encargado.php");
        req.send(data);
    }

    function stepRequest() {
        let req = new XMLHttpRequest();
        let data = new FormData();
        data.append('codigo', currentId.toString());
        data.append('siguienteEstado', '');
        req.onload = makeUpdateModal(req, currentId);
        req.responseType = 'json';
        
        req.open("POST", "actualizar_solicitud_encargado.php");
        req.send(data);
    }

    // no solamente actualiza el modal, tambien la fila
    function updateModal(response, codigo) {
        if (response.estado === 'Nuevo') {
            stepRequest();
        }
        document.getElementById('btnActualizar').disabled = response.estado === 'Resuelto';
        document.getElementById('estadoModal').innerText = response.estado;

        // en este momento la columna 6 es donde está el estado
        // cambiar el numero de nth-child si esto se modifica
        document.querySelector('tr[x-codigo="' + codigo.toString() + '"] :nth-child(6)').innerText = response.estado;
    }

    function makeUpdateId(el) {
        return function(evt) {
            currentId = parseInt(el.getAttribute('x-codigo'));
            requestUpdate();
        };
    }

    Array.prototype.forEach.call(
        document.querySelectorAll('[x-codigo] button.ver-btn'),
        function(x) {
            x.addEventListener('click', makeUpdateId(x));
        }
    );
    document.getElementById('btnActualizar').addEventListener('click', function(evt) {
        stepRequest();
    });

})();