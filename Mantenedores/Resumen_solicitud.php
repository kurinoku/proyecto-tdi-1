<?php
require_once 'conexion_p.php';
require_once('../auth_admin.php');
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">


    <title>Resumen de solicitudes</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
    <link href="../css/Resumen_solicitud.css" rel="stylesheet">
  </head>

  <body class="d-flex flex-column min-vh-100">
      
    

    <div class="container-fluid">
        <?php
        require('Navbar_administrador.html');
        ?>
        <div class="row">       
            <div>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Resumen de solicitudes</h1>
                        
                    </div>

                    <?php              
                        require_once('Graficos_tipo.php');                     
                        require_once('Graficos_estado.php');
                    ?>
                    <h2>Grafica de estado de la solicitud</h2>
                    <canvas class="my-4" id="Grafico_Estado" width="900" height="380"></canvas>
                    <h2>Grafica del tipo de solicitud</h2>
                    <canvas class="my-4" id="Grafico_Tipo" width="900" height="380"></canvas>

                    
                    <div class="table-responsive">
                        <div class="col-lg-12 col-md-12 ps-1">
                            <legend class="text-center pt-3">Registro de las Solicitudes</legend>
                            <table class="table table-striped table-hover">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Codigo departamento</th>
                                        <th>Rut persona</th>
                                        <th>Tipo retroalimentacion</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <?php
                                $consulta = "SELECT * FROM `solicitud` ORDER BY `Creada_solicitud` DESC";
                                $resultado = mysqli_query($conexion, $consulta);
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $Cod = $row['Codigo_solicitud'];
                                    $Codigo = $row['Codigo_dep'];
                                    $Rut = $row['Rut_persona'];
                                    $Tipo = $row['Tipo_solicitud'];
                                    $Descripcion = $row['Descripcion_solicitud'];
                                    $Estado = $row['Estado_solicitud'];
                                    $Fecha = $row['Creada_solicitud'];
                                    echo "<tr>";
                                    echo "<td>" . $Cod . "</td>";
                                    echo "<td>" . $Codigo . "</td>";
                                    echo "<td>" . $Rut . "</td>";
                                    echo "<td>" . $Tipo . "</td>";
                                    echo "<td>" . $Descripcion . "</td>";
                                    echo "<td>" . $Estado . "</td>";
                                    echo "<td>" . $Fecha . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
    

    

   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
        
        <!-- Grafico de sugerencia vs reclamo vs felicitaciones -->
        <script>          
            var ctx = document.getElementById("Grafico_Tipo");
           
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    datasets: [{
                        label: 'Sugerencias',
                        data: [<?php echo $enerosug ?>, <?php echo $febrerosug ?>, <?php echo $marzosug ?>, 
                        <?php echo $abrilsug ?>, <?php echo $mayosug ?>, <?php echo $juniosug ?>,
                        <?php echo $juliosug ?>, <?php echo $agostosug ?>, <?php echo $septiembresug ?>,
                        <?php echo $octubresug ?>, <?php echo $noviembresug ?>, <?php echo $diciembresug ?> ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        borderWidth: 4,
                        pointBackgroundColor: '#007bff'
                    },
                    {
                        label: 'Reclamos',
                        data: [<?php echo $enerorec ?>, <?php echo $febrerorec ?>, <?php echo $marzorec ?>, 
                        <?php echo $abrilrec ?>, <?php echo $mayorec ?>, <?php echo $juniorec ?>,
                        <?php echo $juliorec ?>, <?php echo $agostorec ?>, <?php echo $septiembrerec ?>,
                        <?php echo $octubrerec ?>, <?php echo $noviembrerec ?>, <?php echo $diciembrerec ?> ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#ff0000',
                        borderWidth: 4,
                        pointBackgroundColor: '#ff0000'
                    },
                    {
                        label: 'Felicitaciones',
                        data: [<?php echo $enerofel ?>, <?php echo $febrerofel ?>, <?php echo $marzofel ?>, 
                        <?php echo $abrilfel ?>, <?php echo $mayofel ?>, <?php echo $juniofel ?>,
                        <?php echo $juliofel ?>, <?php echo $agostofel ?>, <?php echo $septiembrefel ?>,
                        <?php echo $octubrefel ?>, <?php echo $noviembrefel ?>, <?php echo $diciembrefel ?> ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#1aff00',
                        borderWidth: 4,
                        pointBackgroundColor: '#1aff00' 
                    }]
                },
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
                }
            });    
        </script>

        <!-- Grafico de estado de solicitud -->
        <script>          
            var ctx = document.getElementById("Grafico_Estado");
           
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    datasets: [{
                        label: 'Nuevo',
                        data: [<?php echo $eneronu ?>, <?php echo $febreronu ?>, <?php echo $marzonu ?>, 
                        <?php echo $abrilnu ?>, <?php echo $mayonu ?>, <?php echo $junionu ?>,
                        <?php echo $julionu ?>, <?php echo $agostonu ?>, <?php echo $septiembrenu ?>,
                        <?php echo $octubrenu ?>, <?php echo $noviembrenu ?>, <?php echo $diciembrenu ?> ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        borderWidth: 4,
                        pointBackgroundColor: '#007bff'
                    },
                    {
                        label: 'Visto',
                        data: [<?php echo $enerovi ?>, <?php echo $febrerovi ?>, <?php echo $marzovi ?>, 
                        <?php echo $abrilvi ?>, <?php echo $mayovi ?>, <?php echo $juniovi ?>,
                        <?php echo $juliovi ?>, <?php echo $agostovi ?>, <?php echo $septiembrevi ?>,
                        <?php echo $octubrevi ?>, <?php echo $noviembrevi ?>, <?php echo $diciembrevi ?> ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#ff0000',
                        borderWidth: 4,
                        pointBackgroundColor: '#ff0000'
                    },
                    {
                        label: 'Procesando',
                        data: [<?php echo $eneropr ?>, <?php echo $febreropr ?>, <?php echo $marzopr ?>, 
                        <?php echo $abrilpr ?>, <?php echo $mayopr ?>, <?php echo $juniopr ?>,
                        <?php echo $juliopr ?>, <?php echo $agostopr ?>, <?php echo $septiembrepr ?>,
                        <?php echo $octubrepr ?>, <?php echo $noviembrepr ?>, <?php echo $diciembrepr ?> ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#fff200',
                        borderWidth: 4,
                        pointBackgroundColor: '#fff200' 
                    },
                    {
                        label: 'Resuelto',
                        data: [<?php echo $enerores ?>, <?php echo $febrerores ?>, <?php echo $marzores ?>, 
                        <?php echo $abrilres ?>, <?php echo $mayores ?>, <?php echo $juniores ?>,
                        <?php echo $juliores ?>, <?php echo $agostores ?>, <?php echo $septiembreres ?>,
                        <?php echo $octubreres ?>, <?php echo $noviembreres ?>, <?php echo $diciembreres ?> ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#1aff00',
                        borderWidth: 4,
                        pointBackgroundColor: '#1aff00' 
                    }]
                },
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
                }
            });    
        </script>
        
    </body>
    
</html>