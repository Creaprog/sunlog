<?php
$db = new PDO("mysql:host=localhost;dbname=test;dbname=Sunlog;charset=utf8","root","root");
$sql = "SELECT * FROM `membre`";
foreach  ($db->query($sql) as $row) {
    print $row['prenom'] . "\t";
}