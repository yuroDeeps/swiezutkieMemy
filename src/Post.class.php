<?php

class Post {
    static function upload(string $tempFileName, string $title = "") {
        $uploadDir = "img/";

        $imageInfo = getimagesize($tempFileName);

        if(!is_array($imageInfo)) {
            die("Nieprawidłowy format obrazu!");
        }

        $randomSeed = rand(10000, 99999) . hrtime(true);

        $hash = hash("sha256", $randomSeed);

        $targetFileName = $uploadDir . $hash . ".webp";

        if(file_exists($targetFileName))
        {
            die("Plik o tej nazwie już istnieje");
        }

        $imgString = file_get_contents($tempFileName);

        $gdImage = @imagecreatefromstring($imgString);

        imagewebp($gdImage, $targetFileName);

        global $db;

        $ip = $_SERVER['REMOTE_ADDR'];

        $dateTime = DATE("Y-m-d H:i:s");

        $sql = "INSERT INTO post (timestamp, filename, ip, title)
            VALUES ('$dateTime', '$targetFileName', '$ip', '$title')";

        $db->query($sql);

        $db->close();
    }
}

?>