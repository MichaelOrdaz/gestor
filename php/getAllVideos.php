<?php
require_once("videos.php");
$videos = new videos();

$all = $videos->getAllVideos();
echo json_encode($all);

?>