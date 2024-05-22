<?php
if (isset($_POST['image'])) {
    $image = $_POST('image');
    header("Content-type: " . $_POST["imageType"]);
    echo $row["imageData"];
}
?>