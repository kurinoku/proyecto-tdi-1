<?php
    $consulta = "SELECT 
    count(if(MONTH(`Creada_solicitud`) = 1 AND Estado_solicitud = 'Nuevo',1,null)) AS `enero_n`, 
    count(if(MONTH(`Creada_solicitud`) = 2 AND Estado_solicitud = 'Nuevo',1,null)) AS febrero_n,
    count(if(MONTH(`Creada_solicitud`) = 3 AND Estado_solicitud = 'Nuevo',1,null)) AS marzo_n,
    count(if(MONTH(`Creada_solicitud`) = 4 AND Estado_solicitud = 'Nuevo',1,null)) AS abril_n,
    count(if(MONTH(`Creada_solicitud`) = 5 AND Estado_solicitud = 'Nuevo',1,null)) AS mayo_n,
    count(if(MONTH(`Creada_solicitud`) = 6 AND Estado_solicitud = 'Nuevo',1,null)) AS junio_n,
    count(if(MONTH(`Creada_solicitud`) = 7 AND Estado_solicitud = 'Nuevo',1,null)) AS julio_n,
    count(if(MONTH(`Creada_solicitud`) = 8 AND Estado_solicitud = 'Nuevo',1,null)) AS agosto_n,
    count(if(MONTH(`Creada_solicitud`) = 9 AND Estado_solicitud = 'Nuevo',1,null)) AS septiembre_n,
    count(if(MONTH(`Creada_solicitud`) = 10 AND Estado_solicitud = 'Nuevo',1,null)) AS octubre_n,
    count(if(MONTH(`Creada_solicitud`) = 11 AND Estado_solicitud = 'Nuevo',1,null)) AS noviembre_n,
    count(if(MONTH(`Creada_solicitud`) = 12 AND Estado_solicitud = 'Nuevo',1,null)) AS diciembre_n,

    count(if(MONTH(`Creada_solicitud`) = 1 AND Estado_solicitud = 'Visto',1,null)) AS `enero_v`, 
    count(if(MONTH(`Creada_solicitud`) = 2 AND Estado_solicitud = 'Visto',1,null)) AS febrero_v,
    count(if(MONTH(`Creada_solicitud`) = 3 AND Estado_solicitud = 'Visto',1,null)) AS marzo_v,
    count(if(MONTH(`Creada_solicitud`) = 4 AND Estado_solicitud = 'Visto',1,null)) AS abril_v,
    count(if(MONTH(`Creada_solicitud`) = 5 AND Estado_solicitud = 'Visto',1,null)) AS mayo_v,
    count(if(MONTH(`Creada_solicitud`) = 6 AND Estado_solicitud = 'Visto',1,null)) AS junio_v,
    count(if(MONTH(`Creada_solicitud`) = 7 AND Estado_solicitud = 'Visto',1,null)) AS julio_v,
    count(if(MONTH(`Creada_solicitud`) = 8 AND Estado_solicitud = 'Visto',1,null)) AS agosto_v,
    count(if(MONTH(`Creada_solicitud`) = 9 AND Estado_solicitud = 'Visto',1,null)) AS septiembre_v,
    count(if(MONTH(`Creada_solicitud`) = 10 AND Estado_solicitud = 'Visto',1,null)) AS octubre_v,
    count(if(MONTH(`Creada_solicitud`) = 11 AND Estado_solicitud = 'Visto',1,null)) AS noviembre_v,
    count(if(MONTH(`Creada_solicitud`) = 12 AND Estado_solicitud = 'Visto',1,null)) AS diciembre_v,
    
    count(if(MONTH(`Creada_solicitud`) = 1 AND Estado_solicitud = 'Procesando',1,null)) AS `enero_p`, 
    count(if(MONTH(`Creada_solicitud`) = 2 AND Estado_solicitud = 'Procesando',1,null)) AS febrero_p,
    count(if(MONTH(`Creada_solicitud`) = 3 AND Estado_solicitud = 'Procesando',1,null)) AS marzo_p,
    count(if(MONTH(`Creada_solicitud`) = 4 AND Estado_solicitud = 'Procesando',1,null)) AS abril_p,
    count(if(MONTH(`Creada_solicitud`) = 5 AND Estado_solicitud = 'Procesando',1,null)) AS mayo_p,
    count(if(MONTH(`Creada_solicitud`) = 6 AND Estado_solicitud = 'Procesando',1,null)) AS junio_p,
    count(if(MONTH(`Creada_solicitud`) = 7 AND Estado_solicitud = 'Procesando',1,null)) AS julio_p,
    count(if(MONTH(`Creada_solicitud`) = 8 AND Estado_solicitud = 'Procesando',1,null)) AS agosto_p,
    count(if(MONTH(`Creada_solicitud`) = 9 AND Estado_solicitud = 'Procesando',1,null)) AS septiembre_p,
    count(if(MONTH(`Creada_solicitud`) = 10 AND Estado_solicitud = 'Procesando',1,null)) AS octubre_p,
    count(if(MONTH(`Creada_solicitud`) = 11 AND Estado_solicitud = 'Procesando',1,null)) AS noviembre_p,
    count(if(MONTH(`Creada_solicitud`) = 12 AND Estado_solicitud = 'Procesando',1,null)) AS diciembre_p,

    count(if(MONTH(`Creada_solicitud`) = 1 AND Estado_solicitud = 'Resuelto',1,null)) AS `enero_rs`, 
    count(if(MONTH(`Creada_solicitud`) = 2 AND Estado_solicitud = 'Resuelto',1,null)) AS febrero_rs,
    count(if(MONTH(`Creada_solicitud`) = 3 AND Estado_solicitud = 'Resuelto',1,null)) AS marzo_rs,
    count(if(MONTH(`Creada_solicitud`) = 4 AND Estado_solicitud = 'Resuelto',1,null)) AS abril_rs,
    count(if(MONTH(`Creada_solicitud`) = 5 AND Estado_solicitud = 'Resuelto',1,null)) AS mayo_rs,
    count(if(MONTH(`Creada_solicitud`) = 6 AND Estado_solicitud = 'Resuelto',1,null)) AS junio_rs,
    count(if(MONTH(`Creada_solicitud`) = 7 AND Estado_solicitud = 'Resuelto',1,null)) AS julio_rs,
    count(if(MONTH(`Creada_solicitud`) = 8 AND Estado_solicitud = 'Resuelto',1,null)) AS agosto_rs,
    count(if(MONTH(`Creada_solicitud`) = 9 AND Estado_solicitud = 'Resuelto',1,null)) AS septiembre_rs,
    count(if(MONTH(`Creada_solicitud`) = 10 AND Estado_solicitud = 'Resuelto',1,null)) AS octubre_rs,
    count(if(MONTH(`Creada_solicitud`) = 11 AND Estado_solicitud = 'Resuelto',1,null)) AS noviembre_rs,
    count(if(MONTH(`Creada_solicitud`) = 12 AND Estado_solicitud = 'Resuelto',1,null)) AS diciembre_rs
    FROM solicitud WHERE YEAR(`Creada_solicitud`) = YEAR(CURDATE()) ";
    $resultado = mysqli_query($conexion, $consulta);
    while ($row = mysqli_fetch_assoc($resultado)){  
        $eneronu = $row['enero_n'];
        $febreronu = $row['febrero_n'];
        $marzonu = $row['marzo_n'];
        $abrilnu = $row['abril_n'];
        $mayonu = $row['mayo_n'];
        $junionu= $row['junio_n'];
        $julionu = $row['julio_n'];
        $agostonu = $row['agosto_n'];
        $septiembrenu = $row['septiembre_n'];
        $octubrenu = $row['octubre_n'];
        $noviembrenu = $row['noviembre_n'];
        $diciembrenu = $row['diciembre_n'];

        $enerovi = $row['enero_v'];
        $febrerovi = $row['febrero_v'];
        $marzovi = $row['marzo_v'];
        $abrilvi = $row['abril_v'];
        $mayovi = $row['mayo_v'];
        $juniovi = $row['junio_v'];
        $juliovi = $row['julio_v'];
        $agostovi = $row['agosto_v'];
        $septiembrevi = $row['septiembre_v'];
        $octubrevi = $row['octubre_v'];
        $noviembrevi = $row['noviembre_v'];
        $diciembrevi = $row['diciembre_v'];

        $eneropr = $row['enero_p'];
        $febreropr = $row['febrero_p'];
        $marzopr = $row['marzo_p'];
        $abrilpr = $row['abril_p'];
        $mayopr = $row['mayo_p'];
        $juniopr = $row['junio_p'];
        $juliopr = $row['julio_p'];
        $agostopr = $row['agosto_p'];
        $septiembrepr = $row['septiembre_p'];
        $octubrepr = $row['octubre_p'];
        $noviembrepr = $row['noviembre_p'];
        $diciembrepr = $row['diciembre_p'];

        $enerores = $row['enero_rs'];
        $febrerores = $row['febrero_rs'];
        $marzores = $row['marzo_rs'];
        $abrilres = $row['abril_rs'];
        $mayores = $row['mayo_rs'];
        $juniores = $row['junio_rs'];
        $juliores = $row['julio_rs'];
        $agostores = $row['agosto_rs'];
        $septiembreres = $row['septiembre_rs'];
        $octubreres = $row['octubre_rs'];
        $noviembreres = $row['noviembre_rs'];
        $diciembreres = $row['diciembre_rs'];

    }