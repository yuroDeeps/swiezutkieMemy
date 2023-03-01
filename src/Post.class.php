<?php

class Post {
    static function upload(string $tempFileName) {
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
    }
}

?>