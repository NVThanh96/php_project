<?php


class API{

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
        include(__DIR__ . '/../../views/site/API/show.php');
    }

}
