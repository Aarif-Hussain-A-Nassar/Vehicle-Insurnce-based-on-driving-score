<?php

set_time_limit(0);
require_once('blockchain.php');

/*
Set up a simple chain and mine two blocks.
*/

$testCoin = new BlockChain();


		$testCoin->push(new Block("token", strtotime("now"),"$tok"));


json_encode($testCoin, JSON_PRETTY_PRINT);

//echo json_encode;