<?php
require_once 'AnimalRepo.php';
Class AnimalController{
    private $mysqli;
    private $AnimalRepoObj;

    function __construct($mysqli, ?string $REQUEST_METHOD, $AnimalRepoObj){
        $this->mysqli = $mysqli;
        $this->AnimalRepoObj = $AnimalRepoObj;
        if ($REQUEST_METHOD === 'GET')
            $this->getMapping();
        if ($REQUEST_METHOD === 'POST')
            $this->postMapping();
        if ($REQUEST_METHOD === 'DELETE')
            $this->deleteMapping();
        if ($REQUEST_METHOD === 'PATCH')
            $this->patchMapping();
    }

    //eсли get запрос
    private function getMapping(){
        $this->AnimalRepoObj->get();
    }
    private function postMapping(){
        $this->AnimalRepoObj->post();
    }
    private function deleteMapping(){
        $this->AnimalRepoObj->delete();
    }
   private function patchMapping(){
        $this->AnimalRepoObj->patch();
    }
}
// подключаемся к бд
// $mysqli = new mysqli("db", "user", "password", "appDB", $_SERVER['REQUEST_METHOD']);
$mysqli = new mysqli("db", "user", "password", "appDB");
$AnimalRepoObj = new AnimalRepo($mysqli);
$animalCl = new AnimalController($mysqli, $_SERVER['REQUEST_METHOD'], $AnimalRepoObj);
