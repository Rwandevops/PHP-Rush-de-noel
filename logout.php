<?php
    session_unset();
    $_session=array();
    session_destroy();
    header('location:login.php');
