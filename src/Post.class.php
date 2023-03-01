<?php

class Post {
    private string $title;
    private string $imageUrl;
    private string $timeStamp;

    function __construct(string $title, string $imageUrl, string $timeStamp)
    {
        $this->title = $title;
        $this->imageUrl = $imageUrl;
        $this->timeStamp = $timeStamp;
    }

    static function get(int $id) : Post {
        global $db;
        $query = $db->prepare("SELECT * FROM post WHERE id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        $resultArray = $result->fetch_assoc();
        return new Post($resultArray['title'],
                        $resultArray['filename'],
                        $resultArray['timestamp']);
    }

    static function getPage(int $pageNumber = 1, int $postsPerPage = 10) {
        global $db;
        $query = $db->prepare("SELECT * FROM post LIMIT 10 OFFSET ?");
        $offset = ($pageNumber-1) * $postsPerPage;
        $query->bind_param('i', $offset);
        $query->execute();
        $result = $query->get_result();
        $postArray = array();
        while($row = $result->fetch_assoc()) {
            $post = new Post($row['title'],
                        $row['filename'],
                        $row['timestamp']);
            array_push($postArray, $post);
        }
            return $postArray;
    }

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