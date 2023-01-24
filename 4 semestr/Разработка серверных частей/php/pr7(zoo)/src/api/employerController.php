<?php
require_once 'EmployerRepo.php';
Class EmployerController{
        private $mysqli;
        private $EmployerRepoObj;
        function __construct($mysqli, ?string $REQUEST_METHOD, $EmployerRepoObj){
            $this->mysqli = $mysqli;
            $this->EmployerRepoObj = $EmployerRepoObj;
            if ($REQUEST_METHOD === 'GET')
                $this->getMapping();
            if ($REQUEST_METHOD === 'POST')
                $this->postMapping();
            if ($REQUEST_METHOD === 'DELETE')
                $this->deleteMapping();
            if ($REQUEST_METHOD === 'PATCH')
                $this->patchMapping();
        }
             private function getMapping(){
                 $this->EmployerRepoObj->get();
             }
             private function postMapping(){
                 $this->EmployerRepoObj->post();
             }
             private function deleteMapping(){
                 $this->EmployerRepoObj->delete();
             }
            private function patchMapping(){
                 $this->EmployerRepoObj->patch();
             }
}
// подключаемся к бд
$mysqli = new mysqli("db", "user", "password", "appDB");
$EmployerRepoObj = new EmployerRepo($mysqli);
$EmployerCl = new EmployerController($mysqli, $_SERVER['REQUEST_METHOD'], $EmployerRepoObj);
