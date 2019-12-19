<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <?php
        if(isset($_POST['action'])){
            if($_POST['action']=='upload'){
                //Get info file.
                $file_size = $_FILES['archivo']['size'];
                $file_type = $_FILES['archivo']['type'];
                $archivo = $_FILES['archivo']['name'];
                // $prefijo =  substr(md5(uniqid(rand())),0,6);
                echo($file_size);
                echo($file_type);
                echo($archivo);
                // echo($prefijo);
                if($archivo != ""){
                    //Guardamos el archivo
                    // $destino = "images/".$prefijo."_".$archivo;
                    $destino = "images/$archivo";      
                    // echo($destino);
                    if(copy($_FILES['archivo']['tmp_name'],$destino)){
                    //   header('Location: ./view_image.php');      
                      echo "<script>
                      Swal.fire(
                        'Good!',
                        'Image upload!',
                        'success'
                      ).then(()=>{
                        window.location = './view_image.php';
                      });
                      </script>";
                    } else
                        echo 'Error al subir el archivo';
                }else 
                    echo 'Error al subir';
            }else
                echo('upload');
        }else
            echo('action');
    ?>

</body>
</html>