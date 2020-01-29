<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';


// getPaginateMedias() works with and without authentication
$instagram = \InstagramScraper\Instagram::withCredentials('username', 'password', '/path/to/cache/folder');
$instagram->login();

$result = $instagram->getPaginateMedias('kevin');
$medias = $result['medias'];
if ($result['hasNextPage'] === true) {
    $result = $instagram->getPaginateMedias('kevin', $result['maxId']);
    $medias = array_merge($medias, $result['medias']);
}

echo json_encode($medias, JSON_THROW_ON_ERROR);
