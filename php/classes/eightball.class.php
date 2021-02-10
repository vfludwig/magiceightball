

<?php
/*
*    eightball.class.php
 *
*    Joy Harvel
 *
*    09/18/2016
 *
*/
class eightball{
	public $answer;
    function __construct($total) {
        $this->answer = mt_rand( 0 , $total);
    }
}
?>