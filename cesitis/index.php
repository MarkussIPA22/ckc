<?php

$config = require "config.php";
require "database.php";

$db = new Database($config);

$query_string = "SELECT * FROM pasakumi";
$params = [];

if(isset($_GET["id"]) && $_GET["id"] != "") {
    $query_string .= " WHERE id=:id"; 
    $params = [":id" => $_GET["id"]];
    //".=" panem ieprieksejo vertibu un pieliek where klat
}
$pasakumi = $db->execute($query_string, $params);
require "views/index.view.php";