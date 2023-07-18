<?php
include(dirname(dirname(dirname(__FILE__))).'/Models/site/HomeDB.php');

class Home{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'show';
        switch ($action) {
            case 'show':
                $this->show();
                break;
            default:
                echo 'Method Invalid';
                break;
        }
    }

    //Danh sách student
    public function show () {
        include('Views/site/home/home.php');
    }

}
