<?php
session_start();
if (isset($_SESSION['std_id']))
{
    session_destroy();
    echo "<script> window.location='std_login.php' </script>";
}