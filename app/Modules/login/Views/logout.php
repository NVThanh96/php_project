<?php
    unset($_SESSION['username']);
    session_destroy();
    header("location: /JobDnict/php_project/app/login");
    die();

