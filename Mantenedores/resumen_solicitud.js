(function() {
    "use strict";
    let req = new XMLHttpRequest();

    function onLoad(evt) {
        let response = req.response;

        function sortPorMes(data) {
            data.sort(function(a, b) {
                if (a.mes < b.mes) return -1;
                if (a.mes > b.mes) return 1;
                return 0;
            });
        }

        // al recibir la data, los meses en los que no hay registros
        // no aparecen, esto retorna una nueva lista rellenada con los
        // meses faltantes con cantidad 0
        function arregloMesFaltantes(data) {
            let ret = [];
            let mes = 1;
            for (let i = 0; i < data.length && mes <= 12; ++i) {
                let d = data[i];
                for (; mes < d.mes; ++mes) {
                    ret.push({
                        cantidad: 0,
                        mes: mes
                    });
                }
                ret.push(d);
                ++mes;
            }
            for (; mes <= 12; ++mes) {
                ret.push({
                    cantidad: 0,
                    mes: mes
                });
            }
            return ret;
        }


        // combina el estilo con los datasets
        // acc es un diccionario con listas de numeros
        //   cada llave en acc es un label de un dataset
        //   y cada lista es los datos de la grafica
        // opts es un diccionario con las mismas llaves que acc
        //   contiene estilo y otras opciones para ese datasets
        //   el cual Graph.js interpretará
        function buildDatasets(acc, opts) {
            let datasets = [];
            for (let k in acc) {
                let d = Object.assign({}, {label: k, data: acc[k]}, opts[k]);
                datasets.push(d);
            }
            return datasets;
        }

        
        // data es un array en el cual cada elemento
        // es un diccionario que tiene la siguiente forma
        /* 
            {
                mes: <numero>,
                cantidad: <numero>,
                <key>: <string>
            }
            donde <key> es el valor de key
        */
        function makeChart(id, key, data, opts) {
            let ctx;

            ctx = document.getElementById(id);
            let acc = {};

            // acumular todos los puntos que tienen el mismo valor
            // en la propiedad dada por key
            for (let i = 0; i<data.length; ++i) {
                let o = data[i];
                let subKey = o[key];
                if (!(subKey in acc)) {
                    acc[subKey] = [];
                }
                acc[subKey].push(o);
            }

            // ordenar por mes, agregar meses faltantes con valor cero
            // y dejar en acc listas de solo numeros
            for (let k in acc) {
                let d = acc[k];
                sortPorMes(d);
                d = arregloMesFaltantes(d);
                acc[k] = d.map(function(x){ return x.cantidad; });
            }

            let chart = new Chart(ctx, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: 7
                            }
                        }]
                    },
                    legend: {
                        display: true,
                    }
                },
                data: {
                    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    datasets: buildDatasets(acc, opts)
                }
            });
        }

        makeChart(
            "Grafico_Tipo", 
            'tipo', 
            response['por_tipo'], 
            {
                Sugerencia: {
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                },
                Reclamos:{
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#ff0000',
                    borderWidth: 4,
                    pointBackgroundColor: '#ff0000'
                },
                Felicitaciones: {
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#1aff00',
                    borderWidth: 4,
                    pointBackgroundColor: '#1aff00' 
            }
        });

        makeChart(
            "Grafico_Estado", 
            'estado', 
            response['por_estado'], 
            {
                'Nuevo':{
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                },
                'Visto':{
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#ff0000',
                    borderWidth: 4,
                    pointBackgroundColor: '#ff0000'
                },
                'Procesando':{
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#fff200',
                    borderWidth: 4,
                    pointBackgroundColor: '#fff200' 
                },
                'Resuelto':{
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#1aff00',
                    borderWidth: 4,
                    pointBackgroundColor: '#1aff00' 
                }
            });
    }

    req.responseType = 'json';
    req.addEventListener('load', onLoad);
    req.open("GET", "stat_solicitud_admin.php");
    req.send();
})();