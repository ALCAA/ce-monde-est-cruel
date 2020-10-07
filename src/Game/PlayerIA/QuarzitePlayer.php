<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class QuarzitePlayers
 * @package Hackathon\PlayerIA
 * @author Antoine Trollet
 */
class QuarzitePlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        if ($this->result->getNbRound() < 10)
        {
            return $this->CounterChoice();
        }
        else
        {
            if ($this->result->getLastScoreFor($this->mySide) == 0)
            {
                if ($this->result->getLastScoreFor($this->opponentSide) == "rock")
                {
                    return parent::rockChoice();
                }
                else
                {
                    return parent::paperChoice();
                }
            }
            else
            {
                return $this->CounterChoice();
            }
        }
    }

    public function CounterChoice()
    {
        if ($this->result->getLastChoiceFor($this->opponentSide) == "rock")
        {
            return parent::paperChoice();
        }
        if ($this->result->getLastChoiceFor($this->opponentSide) == "paper")
        {
            return parent::scissorsChoice();
        }
        else
        {
            return parent::rockChoice();
        }
    }
};
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
