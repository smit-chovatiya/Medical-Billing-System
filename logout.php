<?php

    session_start(); // session start
    session_unset();// session end
    header("Location:index.php"); // Navigate to login form
?>