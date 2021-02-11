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

echo "A1";
$host = "34.123.73.233";
$db_name = "MBall";
$username = "root";
$password = "eightball";

echo "B1";
$connection = new mysqli($host, $username, $password, $db_name);
echo "B2";
if($connection->connect_error){
  echo "Failed connection";
  die("Connection failed: " . $connection->connect_error);

}else{
  echo "connected \n";
}

echo "C1";
$question = $_GET["Question"];

$now = date('Y-m-d H:i:s');

$answer = $result;

$ipaddress = $_SERVER['REMOTE_ADDR'];

$query = "INSERT INTO info(questions, answers, datetimerecorded, ipaddress) VALUES('$question', '$answer', '$now', '$ipaddress')";

echo "D1";
if ($connection->query($query) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . $connection->error;
}

$connection->close();
//then you can use them in a PHP function.






                                    }
                                    else{
                                        // Initial value of of the ball
                                        echo'<div id="eight">8</div>' . PHP_EOL;
                                    }
                                    ?>
                                </div>
</div>
