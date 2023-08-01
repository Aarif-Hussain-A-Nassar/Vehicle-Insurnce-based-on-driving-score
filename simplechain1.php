<?php

set_time_limit(0);
require_once('blockchain1.php');

/*
Set up a simple chain and mine two blocks.
*/

$testCoin = new BlockChain();


		$testCoin->push(new Block("token", strtotime("now"),"$python"));


json_encode($testCoin, JSON_PRETTY_PRINT);

//echo json_encode;