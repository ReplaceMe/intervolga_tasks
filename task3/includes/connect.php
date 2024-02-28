<?php

$link = new mysqli("localhost", "root", "", "intervolga");

if($link->connect_error){
    die('Some error accured when connect to DataBase!');
}