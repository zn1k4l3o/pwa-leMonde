<?php
if (isset($_POST['title'])) {
    $konekcija = mysqli_connect("localhost", "root", "", "lemonde") or die("Nema konekcije na server!");
    $title = $_POST['title'];
    $short = $_POST['shortDescription'];
    $long = $_POST['longDescription'];
    $section = $_POST['section'];

    $photo = null;
    $type = null;
    if ($_FILES != null) {
        $file = $_FILES["photo"]["tmp_name"];   

        if(isset($file)){
            $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

            $image_name = addslashes($_FILES['photo']['name']);

            $image_size = getimagesize($_FILES['photo']['tmp_name']);

            if($image_size==FALSE)
                echo "That's not an image.";
            else
            {
                $photo = $image;
                $type=$_FILES['photo']['type'];
            }
        }
    }

    $query = "INSERT INTO posts (title, shortDescription, longDescription, photo, photoType, section) VALUES ('$title', '$short', '$long', '$photo', '$type', '$section')";
    $result = mysqli_query($konekcija, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New post</title>
</head>
<body>
    <form enctype="multipart/form-data" action="newPost.php" method="POST">
        <label for="title">Title</label>
        <br />
        <input name="title" required/>
        <br />
        <label for="photo">Image</label>
        <br />
        <input name="photo" type="file"/>
        <br />
        <label for="shortDescription">Short description</label>
        <br />
        <input name="shortDescription" type="text" required/>
        <br />
        <label for="longDescription">Long description</label>
        <br />
        <textarea name="longDescription" required></textarea>
        <br />
        <select name="section" required>
            <option value="Politics">Politics</option>
            <option value="Sport">Sport</option>
            <option value="Administration">Administration</option>
        </select>
        <input name="submit" type="submit" value="Post" /> 
    </form>
</body>
</html>