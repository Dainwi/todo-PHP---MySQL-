<?php
include_once("../config/config.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Todo</title>


    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $url .'/css/main.css'?>">

    <!-- SCSS -->
    <link rel="stylesheet" href="<?php echo $url .'/css/style.scss'?>">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/24387e5ac3.js" crossorigin="anonymous"></script>

    <!-- Sweet alert2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.5/sweetalert2.min.js" integrity="sha512-WHVh4oxWZQOEVkGECWGFO41WavMMW5vNCi55lyuzDBID+dHg2PIxVufsguM7nfTYN3CEeQ/6NB46FWemzpoI6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>