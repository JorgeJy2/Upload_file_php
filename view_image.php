<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/view_image.css">
    

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.materialboxed');
        var instances = M.Materialbox.init(elems, {});
        elems.open();
    });
</script>

<body>

    <nav>
        <div class="nav-wrapper  red">
            <a href="#" class="brand-logo center">Upload images</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="view_image.php">View</a></li>
                <li><a href="index.html">Upload</a></li>
            </ul>
        </div>
    </nav>
    <?php
    function showFiles($path)
    {
        $dir = opendir($path);
        $files = array();
        while ($current = readdir($dir)) {
            if ($current != "." && $current != "..") {
                if (is_dir($path . $current))
                    showFiles($path . $current . '/');
                else
                    $files[] = $current;
            }
        }
        
        if(sizeof($files)==0){
            echo '<div class="row center-align">';
            echo '  <h4>Images empy</h4>';
            echo '  <img width="20%" class="image_presentation" src="assets/images/img_presentation.svg" alt="" srcset="">';
            echo '</div>';
        }
        echo '<ul>';
        foreach ($files as &$valor) {
            // echo "<li>$valor</li>";
            // echo "<img src='./images/$valor'>";
            echo '  <div class="row center_background">';
            echo '  <div class="col s12 m8 center_card">';
            echo '    <div class="card">';
            echo '      <div class="card-image">';
            echo '          <div class="card_img">';
            echo '              <img class="materialboxed image_view" width="650"  src="./images/' . $valor . '">';
            echo '          </div>';
            echo '        <a href="delete_img.php?image=' . $valor . '" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">delete</i></a>';
            echo '      </div>';
            echo '      <div class="card-content">';
            echo '        <span class="card-title">' . $valor . '</span>';
            echo '        <p>Image (' . $valor . ') saved on server. With a weight ' . filesize("images/$valor") . ' bytes .</p>';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
        echo '</ul>';
    }
    showFiles('images/');
    ?>

    <footer class="page-footer red">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">This's a simple footer and simple description.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">More information</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="https://github.com/jorgeJy2">My GitHub</a></li>
                        <li><a class="grey-text text-lighten-3" href="https://twitter.com/jorge_jacobo_jy">My twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2019 Jorge Jacobo
                <a class="grey-text text-lighten-4 right" href="https://github.com/JorgeJy2/Upload_file_php">Project Git-Hub</a>
            </div>
        </div>
    </footer>


    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">more</i>
        </a>
        <ul>
            <li><a href="view_image.php" class="btn-floating red"><i class="material-icons">attach_file</i></a></li>
            <li><a href="index.html" class="btn-floating yellow darken-1"><i class="material-icons">add</i></a></li>
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elemsFloatingButton = document.querySelectorAll('.fixed-action-btn');
            var instancesFloatingButton = M.FloatingActionButton.init(elemsFloatingButton, {});
        });
    </script>

</body>

</html>