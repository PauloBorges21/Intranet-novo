<?php
/**
 * Created by PhpStorm.
 * User: paulo.borges
 * Date: 07/11/2018
 * Time: 17:30
 */

session_start();

unset($_SESSION['intranetrai']);

header('Location: ../../index.php');
//echo "<script>window.location='../../login.php';</script>";
