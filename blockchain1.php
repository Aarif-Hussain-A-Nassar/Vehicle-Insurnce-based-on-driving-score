<?php
require_once("block.php");

/**
 * A simple blockchain class with proof-of-work (mining).
 */
class BlockChain
{
    /**
     * Instantiates a new Blockchain.
     */
    public function __construct()
    {
        $this->chain = [$this->createGenesisBlock()];
        $this->difficulty = 4;
    }

    /**
     * Creates the genesis block.
     */
    private function createGenesisBlock()
    {
        return new Block(0, strtotime("2017-01-01"), "Genesis Block");
    }

    /**
     * Gets the last block of the chain.
     */
    public function getLastBlock()
    {
        return $this->chain[count($this->chain)-1];
    }

    /**
     * Pushes a new block onto the chain.
     */
    public function push($block)
    {
        $block->previousHash = $this->getLastBlock()->hash;
        $this->mine($block);
        array_push($this->chain, $block);
    }

    /**
     * Mines a block.
     */
    public function mine($block)
    {
        while (substr($block->hash, 0, $this->difficulty) !== str_repeat("0", $this->difficulty)) {
            $block->nonce++;
            $block->hash = $block->calculateHash();
			
			$rr=$block->hash;
			
		
        }

	$myFile = "block1.txt";
$fh = fopen($myFile, 'w') or die("can't open file");

$stringData = $block->hash;

//include("../connection.php");
//$ttt++;

//mysqli_query($con,"update registartion set blockorg='$stringData',status='' where status='3'") or die("error".mysqli_error($con));
fwrite($fh, $stringData);
fclose($fh);
        //echo "Block mined: ".$block->hash."\n";
		
		//echo "Block mined  ".$stringData."<br>";
    }

    /**
     * Validates the blockchain's integrity. True if the blockchain is valid, false otherwise.
     */
    public function isValid()
    {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i-1];

            if ($currentBlock->hash != $currentBlock->calculateHash()) {
                return false;
            }

            if ($currentBlock->previousHash != $previousBlock->hash) {
                return false;
            }
        }

        return true;
    }
}


//createGenesisBlock() - creates the genesis block with a hardcoded timestamp and message.
//getLastBlock() - returns the last block in the chain.
//push($block) - adds a new block to the chain by setting its previous hash to the hash of the last block in the chain, mining the block with the mine($block) method, and then appending it to the chain.
//mine($block) - mines a block by repeatedly incrementing its nonce and recalculating its hash until the hash starts with a specified number of zeroes (determined by the difficulty level).
//isValid() - checks the integrity of the blockchain by validating each block's hash and previous hash.