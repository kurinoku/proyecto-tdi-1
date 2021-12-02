
(function() {
    'use strict';
    
    /* agrega validadores */
    function addValidator(element, regex) {
        console.log(element);
        element.addEventListener('input', function(event) {
            if (regex.test(element.value)) {
                element.setCustomValidity("");
            } else {
                element.setCustomValidity("Error");
            }
        });
    }

    let p = document.getElementsByName('clave')[0];
    addValidator(p, /^[A-Za-z0-9áéíóúÁÉÍÓÚñÑ]{8,14}$/u);

    let u = document.getElementsByName('usuario')[0];
    addValidator(u, /^[0-9]{7,8}$/u);

    ///////

    /* estética de form */

    let form = document.querySelector('.needs-validation');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();

        // esconder mensajes de error de conexion
        // y usuario o clave incorrecto
        ['no-connect', 'wrong-cred'].forEach(function(x) { 
            document.getElementById(x).classList.add('d-none');
        });

        form.classList.add('was-validated');

        if(!form.checkValidity()) {
            return;
        }

        new FormData(form); // necesario para ajax
    }, false);

    
    ///////

    /* ajax */

    form.addEventListener('formdata', function(event) {
        let formdata = event.formData;

        function make(id) {
            return function(evt) {
                document.getElementById(id).classList.remove('d-none');
            };
        }

        let req = new XMLHttpRequest();
        req.addEventListener('load', function(e){
            let r = req.response;

            // Si el logueo resulta, recargar pagina
            if (r.estado == 'success') {
                location = 'login_persona.php';
            } else {
                // de otra manera reiniciar campos
                make('wrong-cred')();
                [p, u].forEach(function(x){ x.classList.add('is-invalid'); });
                p.value = '';
                u.value = '';
            }
        });

        ['abort', 'error'].forEach(function(e){ 
            req.addEventListener(e, make('no-connect')); 
        });

        req.responseType = 'json';
        req.open(form.method, form.action);
        req.send(formdata);
    });

    
})();