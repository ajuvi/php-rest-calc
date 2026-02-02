<?php
//https://lornajane.net/posts/2008/accessing-incoming-put-data-from-php

function getArrayContent(){
    $json = file_get_contents("php://input");
    $data = json_decode($json,true);
    return $data;
}

$method = strtoupper($_SERVER['REQUEST_METHOD']);

$num1=0;
$num2=0;
$result=0;
$operation="";

//llegir els valors de num1 i num2
if($method=='GET'){
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];

} else { //method=='POST' || method=='PUT' || method=='DELETE'
    $data=getArrayContent();
    $num1=$data['num1'];
    $num2=$data['num2'];     
}

//realitzar el càlcul en funció del mètode
if($method=="GET"){
    $result = $num1+$num2;
    $operation = "plus";
} else if($method=="POST"){
    $result = $num1-$num2;
    $operation = "minus";
} else if($method=="PUT"){
    $result = $num1*$num2;
    $operation = "times";
} else if($method=="DELETE"){
    $result = $num1/$num2;
    $operation = "obelus";
}    

//mostrar el resultat del càlcul en format json
header('Content-Type: application/json');
echo json_encode(
	array("method"=>"$method",
	      "operation"=>"$operation",
	      "num1"=>"$num1",
	      "num2"=>"$num2",
	      "result"=>"$result"
));
