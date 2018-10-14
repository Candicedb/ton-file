<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>X-files</title>
</head>
<body>
<h1>Ajouter des images</h1>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for='upload'>Fichier à ajouter</label>
    <input id=upload type="file" name="fichier[]" multiple="multiple"/>
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
    <input type="submit" value="Send" />
</form>


<div class="card-group">
    <?php
    $pictures = scandir('upload');
    foreach ($pictures as $picture) {
    if ($picture != '.' && $picture != '..') {?>

    <div class="card col-4">

        <img class="card-img-top" src="upload/<?php echo $picture; ?>" alt="Card image cap">
        <div class="card-body"><h4><?= $picture ?></h4>
            <a href="delete.php?delete=<?php echo $picture; ?>" class="btn btn-primary">Supprimer</a>
        </div>
    </div>

    <?php
    }
    }

     ?>
</div>











<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>