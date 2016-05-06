<?php
/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 06/05/2016
 * Time: 20:04
 */


require '../categories.php';

$first = new categories();


$first = $first->AdminVuCategorie();


echo '<pre>';
echo var_dump($first);
echo '</per>';

