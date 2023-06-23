<?php
include "DB/Database.php";
class InformationDB{
    function show(){
        try {
            $db = \Connection::getDB();
        }catch (Exception $e){

        }
    }
}