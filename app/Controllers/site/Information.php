<?php

class Information{
      public function __construct()
      {
          $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'show';
          switch ($action){
              case 'show':
                  $this->show();
                  break;
              default:
                  echo 'method wrong';
                  break;
          }
      }

      public function show(){
          $checkAdmin = (new LoginDB())->isAdmin();
          $checkManager = (new LoginDB())->isManager();
          include (__DIR__ . "/../../Views/site/information/index.php");
      }
}