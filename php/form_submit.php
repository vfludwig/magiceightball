<?php
session_start();
$host = "localhost";
$db_name = "eightball";
$username = "root";
$password = "";
$connection = null;
try{
$connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
$connection->exec("set names utf8");
}catch(PDOException $exception){
echo "Connection error: " . $exception->getMessage();
}



use Datetime;

$now = new DateTime();
$now->format('Y-m-d H:i:s');    

$answer = $_SESSION["result"];

$ipaddress = $_SERVER['REMOTE_ADDR'];

function saveData($question, $answer, $now, $ipaddress){
global $connection;
$query = "INSERT INTO info(question, answer, timedaterecorded, ipaddress) VALUES( :question, :answer, :timedaterecorded, :ipaddress)";

$callToDb = $connection->prepare( $query );
$question=htmlspecialchars(strip_tags($question));
$answer=htmlspecialchars(strip_tags($answer));
$timedaterecorded=htmlspecialchars(strip_tags($timedaterecorded));
$ipaddress=htmlspecialchars(strip_tags($ipaddress));
$callToDb->bindParam(":question",$question);
$callToDb->bindParam(":answer",$answer);
$callToDb->bindParam(":timedaterecorded",$timedaterecorded);
$callToDb->bindParam(":ipaddress",$ipaddress);

/*
if($callToDb->execute()){
return '<h3 style="text-align:center;">We will get back to you very shortly!</h3>';
}*/
}

if( isset($_POST['submit'])){
$question = htmlentities($_POST['question']);
$answer = htmlentities($_POST['answer']);
$timedaterecorded = htmlentities($_POST['timedaterecorded']);
$ipaddress = htmlentities($_POST['ipaddress']);

//then you can use them in a PHP function. 
$result = saveData($question, $answer, $timedaterecorded,$ipaddress);
echo $result;
}
else{
echo '<h3 style="text-align:center;">A very detailed error message ( ͡° ͜ʖ ͡°)</h3>';
}
?>