<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['action'])){
            if($_POST['action']=='upload'){
                //obtener el nombre del archivo
                $tamano = $_FILES['archivo']['size'];
                $tipo = $_FILES['archivo']['type'];
                $archivo = $_FILES['archivo']['name'];
                $prefijo =  substr(md5(uniqid(rand())),0,6);
                echo($tamano);
                echo($tipo);
                echo($archivo);
                echo($prefijo);
                if($archivo != ""){
                    //Guardamos el archivo
                    $destino = "files/".$prefijo."_".$archivo;
                    echo($destino);
                    if(copy($_FILES['archivo']['tmp_name'],$destino)){
                      echo  $status = "Archivo subido: <b> ".$archivo." </b>";
                    } else {
                        $status = "Error al subir el archivo";
                    }
                }else {
                    $status = "Error al subirkfkk";
                } 
            }else {
                echo('upload');
            }
        }else {
            echo('action');
        }

    ?>
    
</body>
</html>