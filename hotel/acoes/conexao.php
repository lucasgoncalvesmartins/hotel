<?php 
 function conectar($bd){
    return new PDO("mysql:host=localhost; dbname=$bd", 'root','');

 }

 function encerrar(){
return null;

 }



?>