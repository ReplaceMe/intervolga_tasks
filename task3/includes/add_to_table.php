<?php

require_once 'connect.php';

$name = ($_POST['name']) ? $link->real_escape_string(trim($_POST['name'])) : '';
$message = ($_POST['message']) ? $link->real_escape_string(trim($_POST['message'])) : '';

if($name != '' && $message != ''){

$result = $link->prepare("INSERT INTO `comments` (`id`, `name`, `message`, `date`) VALUES (NULL, ?, ?, CURRENT_DATE())");

$result->bind_param("ss", $name, $message);
$result->execute();


}

header('Location: ../index.php');
