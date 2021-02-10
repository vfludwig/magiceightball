<?php
    session_start();
    function ClassAutoloader($class) {
        include 'php/classes/' . $class . '.class.php';
    }
    spl_autoload_register('ClassAutoloader');
?>
<div class="black-ball">
                                <div class="white-ball">
                                    <?php
                                    if(isset($_REQUEST['Question'])){
                                        
                                    $answers = array("It is certain",
                                        "It is decidedly so",
                                        "Without a doubt",
                                        "Yes, definitely",
                                        "You may rely on it",
                                        "As I see it, yes",
                                        "Most likely",
                                        "Outlook good",
                                        "Yes",
                                        "Signs point to yes",
                                        "Reply hazy try again",
                                        "Ask again later",
                                        "Better not tell you now",
                                        "Cannot predict now",
                                        "Concentrate and ask again",
                                        "Don't count on it",
                                        "My reply is no",
                                        "My sources say no",
                                        "Outlook not so good",
                                        "Very doubtful");
                                        
                                        /*
                                        *    Invoke the wisdom of the Magic 8 Ball.
                                         *
                                        *    Oh great magic eight ball. We beseach thee to answer our question :-P
                                         *   Display the answer.
                                        */
                                        $eightball = new eightball(count($answers)-1);

                                        $result = $answers[ $eightball->answer ];


                                        echo '<span class="answer">' . $result . '</span>' . PHP_EOL;

                                        
$host = "34.86.111.213";
$db_name = "Magic_Eightball";
$username = "root";
$password = "eightball";
$connection = null;
try{
$connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
$connection->exec("set names utf8");
}catch(PDOException $exception){
echo "Connection error: " . $exception->getMessage();
}


$question = $_GET["Question"];

$now = date('Y-m-d H:i:s');

$answer = $result;

$ipaddress = $_SERVER['REMOTE_ADDR'];

function saveData($question, $answer, $now, $ipaddress){
global $connection;
$query = "INSERT INTO info(questions, answers, datetimerecorded, ipaddress) VALUES('$question', '$answer', '$now', '$ipaddress')";

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
$connection->exec($query);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $query . "<br>" . $e->getMessage();
}


}
//then you can use them in a PHP function. 
$results = saveData($question, $answer, $now,$ipaddress);
echo $results;





                                    }
                                    else{
                                        // Initial value of of the ball
                                        echo'<div id="eight">8</div>' . PHP_EOL;
                                    }
                                    ?>
                                </div>
</div>

