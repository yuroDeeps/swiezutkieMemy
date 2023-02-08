<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form actions="" method="post" enctype="multipart/form-data">
        <label for="uploadedFileInput">
                Wybierz plik do wgrania na serwer:
        </label>
        <input type="file" name="uploadedFile" id="uploadedFileInput">
        <input type="submit" value="Wyślij plik" name="submit">
    </form>

<?php 
    if(isset($_POST['submit']))
    {
        $targetDir = "img/";
        $targetFile = $targetDir . $_FILES['uploadedFile']['name'];
        if(file_exists($targetFile))
        {
            die("Plik o tej nazwie już istnieje");
        }
        move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $targetFile);
        // var_dump($_FILES);
    }
?>
</body>
</html>
