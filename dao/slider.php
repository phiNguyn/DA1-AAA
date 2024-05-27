<?php
require_once 'pdo.php';


function get_slider(){
    $sql="SELECT * FROM banner ";
    return pdo_query($sql);
}