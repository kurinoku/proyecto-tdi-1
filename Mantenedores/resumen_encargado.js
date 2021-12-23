(function() {
    "use strict";

    let req = new XMLHttpRequest();
    function onLoad(evt) {
        let response = req.response;

        function makeChart(id, data) {
            let ctx;

            ctx = document.getElementById(id);
            let order = ['Reclamo', 'Sugerencia', 'Felicitaciones'];

            let dataDefinitive = order.map(x => (x in data) ? data[x] : 0);

            let chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: order,
                    datasets: 
                    [{ 
                        data: dataDefinitive,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 10
                    }]  
                }
            });
        }
        console.log(req, response);
        makeChart('Grafico', response);

    }

    req.responseType = 'json';
    req.addEventListener('load', onLoad);
    req.open("GET", "stat_solicitud_encargado.php");
    req.send();

})();