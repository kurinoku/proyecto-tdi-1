<!DOCTYPE html>
<html lang="en">

<?php
require_once "_init.php";
require('Mantenedores/conexion_p.php');
?>

<head>
    <meta charset="UTF-8">
    <title>Municipalidad de Concepción</title>
    <!-- Links -->
    <?php
    bootstrapHead();
    ?>
    <!-- Diseños -->
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <!-- Barra de navegación primaria-->
        <?php require "navbar_index_1.php" ?>
        <!-- Barra de navegación secundaria -->
        <?php require "navbar_index_2.php" ?>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-4">
                    <div class="text-center">
                        <img class="rounded" src="img/mision-cumplida.png" alt="Generic placeholder image" width="140" height="140">
                        <h2>Misión</h2>
                    </div class="text-center">
                    <p>Como municipalidad buscamos trabajar arduamente para satisfacer, por medio de sus servicios y
                        equipo, a las personas usuarias
                        de la entidad y quienes se vinculan con la comuna. Adaptando, fortaleciendo y mejorando su
                        gestión de acuerdo a las necesidades y contingencia, considerando la inclusión, la perspectiva
                        de
                        género y la sostenibilidad en sus labores cotidianas. </p>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <img class="rounded" src="img/vision-compartida.png" alt="Generic placeholder image" width="140" height="140">
                        <h2>Visión</h2>
                    </div class="text-center">
                    <p>Ser un municipio líder, innovador e impulsor del desarrollo sostenible e inclusivo, promotor del
                        enfoque de género y la participación ciudadana, centrado en el bienestar, diversidad y dignidad
                        de
                        las personas de la comuna de "XXXXXX".</p>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <img class="rounded" src="img/municipalidad.png" alt="Generic placeholder image" width="140" height="140">
                        <h2>Valores</h2>
                    </div class="text-center">
                    <p>Para el cumplimiento del Plan, la Municipalidad de "XXXXXX" priorizará sus acciones y políticas
                        en
                        áreas enmarcadas y sustentadas en los siguientes principios y valores, que representan el
                        espíritu
                        del municipio y del funcionariado, como por ejemplo: Participación ciudadana , probidad,
                        eficiencia, transparencia y acceso a la información, compromiso, empatía, inclusión.
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5">
            <div class="row mt-4">
                <div class="col-6">
                    <h2 class="text-black text-center">Campañas y Talleres</h2>
                    <div id="CarouselMuni" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#CarouselMuni" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#CarouselMuni" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#CarouselMuni" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"><img src="img/1.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Mayor sustentabilidad ambiental.</h3>
                                    <p>Se realizarán futuras campañas medioambientales de tal manera que se busque
                                        disminuir contaminacion ambiental.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="img/2.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Curso y actividades de recreación por Bomberos de la zona.</h3>
                                    <p>Los bomberos de la comuna realizarán distintas actividades para ayudar a la
                                        ciudadanía a tomar medidas preventivas en ciertas
                                        situaciones de peligro.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="img/3.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Cursos y talleres RCP.</h3>
                                    <p>Realización de cursos gratuitos de RCP, para toda la ciudadanía, click para ver
                                        más información.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#CarouselMuni" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#CarouselMuni" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
                <div class="col-6">
                <h2 class="text-black text-center">Anuncios</h2>
                    <div id="CarouselNoti" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#CarouselNoti" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#CarouselNoti" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#CarouselNoti" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">

                        <?php
                            $i = 0;
                            $consulta = "SELECT * FROM noticia ORDER BY Id_noticia DESC";
                            $resultado = mysqli_query($conexion, $consulta);
                            while ($row = mysqli_fetch_assoc($resultado) and $i < 3) {
                                
                                $nombre = $row['Nombre_noticia'];
                                $cuerpo = $row['Cuerpo_noticia'];
                                $id = $row['Id_noticia'];
                                $foto1 = $row['Ruta_portada'];

                                if($i == 0){
                                ?>

                                    <div class="carousel-item active">
                                        <a href="#"><img src=<?php echoRutaComillas($foto1);  ?> class="d-block w-100" alt="..."></a>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>
                                                <?php
                                                    echo '<a class="link-light" href="' . buildRuta("Mantenedores/ver_noticia.php?seleccionado=" . $id) . '">' . $nombre . '</a>';
                                                ?>
                                            </h3>
                                            <p><?php echo $cuerpo ?></p>
                                        </div>
                                    </div>

                                <?php
                                }else{
                                ?>
                                    <div class="carousel-item">
                                        <a href="#"><img src=<?php echoRutaComillas($foto1);  ?> class="d-block w-100" alt="..."></a>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>
                                                <?php
                                                    echo '<a class="link-light" href="' . buildRuta("Mantenedores/ver_noticia.php?seleccionado=" . $id) . '">' . $nombre . '</a>';
                                                ?>
                                            </h3>
                                            <p class="text-truncate"><?php echo $cuerpo ?></p>
                                        </div>
                                    </div>
                                
                                <?php
                                }

                                $i += 1;
                            }
                        ?>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#CarouselNoti" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#CarouselNoti" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    bootstrapBody();
    kitFontBody();
    require('Mantenedores/Footer.html');
    ?>
</body>

</html>