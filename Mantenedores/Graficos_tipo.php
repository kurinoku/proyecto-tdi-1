<?php
    $consulta = "SELECT 
    count(if(MONTH(`Creada_solicitud`) = 1 AND Tipo_solicitud = 'Sugerencia',1,null)) AS `enero_s`, 
    count(if(MONTH(`Creada_solicitud`) = 2 AND Tipo_solicitud = 'Sugerencia',1,null)) AS febrero_s,
    count(if(MONTH(`Creada_solicitud`) = 3 AND Tipo_solicitud = 'Sugerencia',1,null)) AS marzo_s,
    count(if(MONTH(`Creada_solicitud`) = 4 AND Tipo_solicitud = 'Sugerencia',1,null)) AS abril_s,
    count(if(MONTH(`Creada_solicitud`) = 5 AND Tipo_solicitud = 'Sugerencia',1,null)) AS mayo_s,
    count(if(MONTH(`Creada_solicitud`) = 6 AND Tipo_solicitud = 'Sugerencia',1,null)) AS junio_s,
    count(if(MONTH(`Creada_solicitud`) = 7 AND Tipo_solicitud = 'Sugerencia',1,null)) AS julio_s,
    count(if(MONTH(`Creada_solicitud`) = 8 AND Tipo_solicitud = 'Sugerencia',1,null)) AS agosto_s,
    count(if(MONTH(`Creada_solicitud`) = 9 AND Tipo_solicitud = 'Sugerencia',1,null)) AS septiembre_s,
    count(if(MONTH(`Creada_solicitud`) = 10 AND Tipo_solicitud = 'Sugerencia',1,null)) AS octubre_s,
    count(if(MONTH(`Creada_solicitud`) = 11 AND Tipo_solicitud = 'Sugerencia',1,null)) AS noviembre_s,
    count(if(MONTH(`Creada_solicitud`) = 12 AND Tipo_solicitud = 'Sugerencia',1,null)) AS diciembre_s,

    count(if(MONTH(`Creada_solicitud`) = 1 AND Tipo_solicitud = 'Reclamo',1,null)) AS `enero_r`, 
    count(if(MONTH(`Creada_solicitud`) = 2 AND Tipo_solicitud = 'Reclamo',1,null)) AS febrero_r,
    count(if(MONTH(`Creada_solicitud`) = 3 AND Tipo_solicitud = 'Reclamo',1,null)) AS marzo_r,
    count(if(MONTH(`Creada_solicitud`) = 4 AND Tipo_solicitud = 'Reclamo',1,null)) AS abril_r,
    count(if(MONTH(`Creada_solicitud`) = 5 AND Tipo_solicitud = 'Reclamo',1,null)) AS mayo_r,
    count(if(MONTH(`Creada_solicitud`) = 6 AND Tipo_solicitud = 'Reclamo',1,null)) AS junio_r,
    count(if(MONTH(`Creada_solicitud`) = 7 AND Tipo_solicitud = 'Reclamo',1,null)) AS julio_r,
    count(if(MONTH(`Creada_solicitud`) = 8 AND Tipo_solicitud = 'Reclamo',1,null)) AS agosto_r,
    count(if(MONTH(`Creada_solicitud`) = 9 AND Tipo_solicitud = 'Reclamo',1,null)) AS septiembre_r,
    count(if(MONTH(`Creada_solicitud`) = 10 AND Tipo_solicitud = 'Reclamo',1,null)) AS octubre_r,
    count(if(MONTH(`Creada_solicitud`) = 11 AND Tipo_solicitud = 'Reclamo',1,null)) AS noviembre_r,
    count(if(MONTH(`Creada_solicitud`) = 12 AND Tipo_solicitud = 'Reclamo',1,null)) AS diciembre_r,
    
    count(if(MONTH(`Creada_solicitud`) = 1 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS `enero_f`, 
    count(if(MONTH(`Creada_solicitud`) = 2 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS febrero_f,
    count(if(MONTH(`Creada_solicitud`) = 3 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS marzo_f,
    count(if(MONTH(`Creada_solicitud`) = 4 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS abril_f,
    count(if(MONTH(`Creada_solicitud`) = 5 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS mayo_f,
    count(if(MONTH(`Creada_solicitud`) = 6 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS junio_f,
    count(if(MONTH(`Creada_solicitud`) = 7 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS julio_f,
    count(if(MONTH(`Creada_solicitud`) = 8 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS agosto_f,
    count(if(MONTH(`Creada_solicitud`) = 9 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS septiembre_f,
    count(if(MONTH(`Creada_solicitud`) = 10 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS octubre_f,
    count(if(MONTH(`Creada_solicitud`) = 11 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS noviembre_f,
    count(if(MONTH(`Creada_solicitud`) = 12 AND Tipo_solicitud = 'Felicitaciones',1,null)) AS diciembre_f
    FROM solicitud WHERE YEAR(`Creada_solicitud`) = YEAR(CURDATE()) ";
    $resultado = mysqli_query($conexion, $consulta);
    while ($row = mysqli_fetch_assoc($resultado)){  
        $enerosug = $row['enero_s'];
        $febrerosug = $row['febrero_s'];
        $marzosug = $row['marzo_s'];
        $abrilsug = $row['abril_s'];
        $mayosug = $row['mayo_s'];
        $juniosug = $row['junio_s'];
        $juliosug = $row['julio_s'];
        $agostosug = $row['agosto_s'];
        $septiembresug = $row['septiembre_s'];
        $octubresug = $row['octubre_s'];
        $noviembresug = $row['noviembre_s'];
        $diciembresug = $row['diciembre_s'];

        $enerorec = $row['enero_r'];
        $febrerorec = $row['febrero_r'];
        $marzorec = $row['marzo_r'];
        $abrilrec = $row['abril_r'];
        $mayorec = $row['mayo_r'];
        $juniorec = $row['junio_r'];
        $juliorec = $row['julio_r'];
        $agostorec = $row['agosto_r'];
        $septiembrerec = $row['septiembre_r'];
        $octubrerec = $row['octubre_r'];
        $noviembrerec = $row['noviembre_r'];
        $diciembrerec = $row['diciembre_r'];

        $enerofel = $row['enero_f'];
        $febrerofel = $row['febrero_f'];
        $marzofel = $row['marzo_f'];
        $abrilfel = $row['abril_f'];
        $mayofel = $row['mayo_f'];
        $juniofel = $row['junio_f'];
        $juliofel = $row['julio_f'];
        $agostofel = $row['agosto_f'];
        $septiembrefel = $row['septiembre_f'];
        $octubrefel = $row['octubre_f'];
        $noviembrefel = $row['noviembre_f'];
        $diciembrefel = $row['diciembre_f'];
    }