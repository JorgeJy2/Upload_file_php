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
  include './message.php';

  if (isset($_POST['action'])) {
    if ($_POST['action'] == 'upload') {
      //Get info file.
      $file_size = $_FILES['archivo']['size'];
      $file_type = $_FILES['archivo']['type'];
      $archivo = $_FILES['archivo']['name'];
      // $prefijo =  substr(md5(uniqid(rand())),0,6);
      // echo($file_size);
      // echo($file_type);
      // echo($archivo);
      // echo($prefijo);
      if ($archivo != "") {
        //Guardamos el archivo
        // $destination = "images/".$prefijo."_".$archivo;
        $destination = "images/$archivo";
        // echo($destination);
        if (copy($_FILES['archivo']['tmp_name'], $destination))
          //   header('Location: ./view_image.php');
          showMsgOk('Image upload!', './view_image.php');
        else
          showMsgError('Could not delete', './index.html');
      } else
        showMsgError('the file is empy', './index.html');
    } else
      showMsgError('the acction is no upload', './index.html');
  } else
    showMsgError('the file is empy', './index.html');
  ?>

</body>

</html>