<?php
require_once("videos.php");
$vt_id = $_POST['vt_id'];

$video = new videos();

$video->get($vt_id);

//print_r($video);

echo json_encode( $video );

?>