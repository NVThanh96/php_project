<?php
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['level']);
session_destroy();
header("location:" . "/JobDnict/project_php/app/login");
die();

