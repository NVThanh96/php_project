<?php
    unset($_SESSION['username']);
    session_destroy();
    header("location: /project_php/app/");
    die();

