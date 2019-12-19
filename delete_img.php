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
        $filename = "images/". $_REQUEST['image'];
        if (file_exists($filename)) {
          unlink($filename);
          echo 'File '.$filename.' has been deleted';
        } else {
          echo 'Could not delete '.$filename.', file does not exist';
        }

    ?>
</body>
</html>