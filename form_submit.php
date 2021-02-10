<?php
$host = "localhost";
$db_name = "dev_to";
$username = "root";
$password = "password";
$connection = null;
try{
$connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
$connection->exec("set names utf8");
}catch(PDOException $exception){
echo "Connection error: " . $exception->getMessage();
}

function saveData($question, $answer, $timedaterecorded){
global $connection;
$query = "INSERT INTO eightball(question, answer, timedaterecorded) VALUES( :question, :answer, :timedaterecorded)";

$callToDb = $connection->prepare( $query );
$question=htmlspecialchars(strip_tags($question));
$answer=htmlspecialchars(strip_tags($answer));
$timedaterecorded=htmlspecialchars(strip_tags($timedaterecorded));
$callToDb->bindParam(":question",$question);
$callToDb->bindParam(":answer",$answer);
$callToDb->bindParam(":timedaterecorded",$timedaterecorded);

/*
if($callToDb->execute()){
return '<h3 style="text-align:center;">We will get back to you very shortly!</h3>';
}*/
}

if( isset($_POST['submit'])){
$name = htmlentities($_POST['name']);
$email = htmlentities($_POST['email']);
$message = htmlentities($_POST['message']);

//then you can use them in a PHP function. 
$result = saveData($name, $email, $message);
echo $result;
}
else{
echo '<h3 style="text-align:center;">A very detailed error message ( ͡° ͜ʖ ͡°)</h3>';
}
?>