<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../controllers/header_controller.php';
require '../models/article.php';

$supprojet = new article();
$getid = $_GET['id'];
var_dump($getid);

if ($_GET['activation'] === 1) {
    $data = $supprojet->Delate($getid);

} else {


    $data = $supprojet->Activation($getid);

}
echo '<script type="text/javascript">window.location.replace("../controllers/index_controller.php");</script>';
?>


