
<?php
if (!empty($_FILES['fichier']['name'][0])){
    $files=$_FILES['fichier'];
    $allowed= array('png', 'gif', 'jpg');
    foreach($files['name'] as $position =>$file_name){
        $file_tmp = $files ['tmp_name'][$position];
        $file_size = $files ['size'] [$position];
        $file_error = $files['error'][$position];
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 1048576) {
                    $file_name_new = 'image'. uniqid() . '.' .$file_ext;
                    $file_destination = 'upload/' . $file_name_new;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        $uploaded[$position] = $file_destination;
                        header("Location: /");
                    } else {
                        $failed = "[{$file_name}] n'a pas été envoyé.";
                        echo "<a href='index.php'>retour à l'accueil</a>";
                    }
                }else{
                    $failed = "[{$file_name}] est trop volumineux.";
                    echo "<a href='index.php'>retour à l'accueil</a>";
                }
            }
        } else {
            $failed = "[{$file_name}] l'extension de fichier '{$file_ext} ' n'est pas autorisée.";
            echo "<a href='index.php'>retour à l'accueil</a>";
        }
    }
    if(!empty($uploaded)){
        echo $uploaded;
    }
    if (!empty($failed)) {
        echo $failed;
    }
}


