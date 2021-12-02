

function ValidaPaginas() {
    "use strict";
    let _this = this;

    this.validadores = [];

    function wrapValidador(v) {
        if (v instanceof RegExp) {
            return function(el) {
                return v.test(el.value);
            };
        } else {
            return v;
        }
    }

    this.wrapValidador = wrapValidador;

    function compararPrioridad(a, b) {
        if (a.prioridad < b.prioridad) return -1;
        if (a.prioridad > b.prioridad) return 1;
        return 0;
    }

    this.conjoin = function(fs) {
        return conjoin(fs.map(wrapValidador));
    };

    this.disjoin = function(fs) {
        return disjoin(fs.map(wrapValidador));
    };

    // La prioridad esta al reves, mas baja significa que se aplica primero
    // esto es necesario porque los validadores se sobreescriben
    // y algunas veces no queremos los mas generales (que tienen prioridad mas baja)

    // Si deberiaValidar es un regex
    //   se compara el name del elemento con el regex

    // deberiaValidar  RegExp|((HTMLElement) -> boolean)
    // validador       RegExp|((HTMLElement) -> boolean)
    // prioridad       integer
    this.agregarValidador = function(name, deberiaValidar, validador, opt) {
        opt = opt || {};
        if (deberiaValidar instanceof RegExp) {
            let re = deberiaValidar;
            deberiaValidar = function(el) {
                return re.test(el.name);
            };
        }

        if (validador instanceof RegExp) {
            validador = wrapValidador(validador);
        } else if (validador instanceof Array) {
            validador = _this.conjoin(validador);
        }
        let o = Object.assign({}, opt, {
            name: name,
            deberia: deberiaValidar, 
            validador: validador
        });
        _this.validadores.push(o);

        _this.validadores.sort(compararPrioridad);
    };

    function conValidador(validador, el) {
        return function() {
            if (validador(el)) {
                el.setCustomValidity("");
            } else {
                el.setCustomValidity("Error");
            }
        };
    }

    this.magia = function() {
        // A cada form
        // De los cuales a cada input o textarea
        // Agregales uno de los validadores que le caben
        Array.prototype.forEach.call(
            document.querySelectorAll('form'),
            function (form) {
                let entradas = form.querySelectorAll('input, textarea');
                _this.validadores.forEach(function(o) {
                    let deberia = o.deberia;
                    let validador = o.validador;
                    entradas.forEach(function(el) {
                        if (deberia(el)) {
                            let attr = 'oninput'; // por defecto

                            el[attr] = conValidador(validador, el);
                            if (typeof o.maxlength == 'number') {
                                el.setAttribute('maxlength', o.maxlength.toString());
                            }
                            if (typeof o.minlength == 'number') {
                                el.setAttribute('minlength', o.minlength.toString());
                            }
                            if (o.required) {
                                el.setAttribute('required', '');
                            }
                        }
                    });
                });

                form.setAttribute('novalidate', '');

                form.addEventListener('submit', function(event){

                    if(!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    
                    form.classList.add('was-validated');
                });
            }
        );
        
    };

    function getOpt(name) {
        for (let i = 0; i<_this.validadores.length; ++i) {
            let o = _this.validadores[i];
            console.log(o);
            if (name == o.name) {
                return [i, o];
            }
        }
        throw new Error("no validador para '" + name + "'");
    }

    this.modificar = function(name, opt) {
        return _this.actualizar(name, function(o){
            Object.assign(o, opt);
        });
    };

    function actualizar(index, update) {
        let o = _this.validadores[index];
        let name = o.name;
        let result = update(o);
        if (!result) {
            throw new Error("funcion actualizar no regreso un objeto valida para '" + name + "'");
        }
        _this.validadores[index] = result;
        return _this;
    }

    // si name es null, se actualiza todos los validadores
    this.actualizar = function(name, update) {
        if (name == null) {
            for (let i = 0; i<_this.validadores.length; ++i) {
                actualizar(i, update);
            }
        } else {
            let indexPlusO = getOpt(name);
            let index = indexPlusO[0];
            actualizar(index, update);
        }
        return _this;
    }

    function containsAtLeast(pat) {
        return function(el) {
            return pat.test(el.value);
        };
    }

    function checkLength(minlength, maxlength) {
        return function(el) {
            let len = el.value.length;
            return len >= minlength && len <= maxlength;
        };
    }

    function inSequence(arr) {
        return function(el) {
            let value = el.value;
            return arr.indexOf(value) >= 0;
        }
    }

    this.validadorVacio = function(el) {
        return el.value == '';
    }

    this.CLAVE_RE = /^[A-Za-záéíóúÁÉÍÓÚñÑ0-9]*$/;

    let agr = this.agregarValidador;

    agr('rut', /^Rut_/, /^[0-9]*$/, {
        minlength: 7,
        maxlength: 8
    });
    agr('nombre', /^Nombre_/, /^[A-Za-záéíóúÁÉÍÓÚñÑ ]*$/u, {
        maxlength: 40,
        minlength: 1
    });

    agr('numero', /^Numero_/, /^[0-9]*$/, {
        maxlength: 9,
        minlength: 9
    });
    agr('correo', /^Correo_/, /^[^@]*@[^@]*$/, {
        maxlength: 40,
        minlength: 3
    });
    agr('clave', /^Clave_/, [
        containsAtLeast(/[a-zñáéíóú]/u),
        containsAtLeast(/[A-ZÑÁÉÍÓÚ]/u),
        containsAtLeast(/[0-9]/u),
        /^[A-Za-záéíóúÁÉÍÓÚñÑ0-9]*$/
    ], {
        maxlength: 14,
        minlength: 8
    });

    agr('nombre-dep', /^Nombre_dep$/, /^[a-zA-ZáéíóúñÁÉÍÓÚÑ ]*$/u, {
        prioridad: 10,
        maxlength: 50,
        minlength: 1
    });
    agr('codigo-dep', /^Codigo_dep$/, /^[a-zA-Z0-9]*$/u, {
        prioridad: 10,
        maxlength: 8,
        minlength: 8
    });

    agr('descripcion-solicitud', /^Descripcion_solicitud$/, /^[A-Za-zñÑáéíóúÁÉÍÓÚ, \.]*$/u, {
        prioridad: 10,
        maxlength: 500
    });



}