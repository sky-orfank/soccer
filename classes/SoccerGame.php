<?php
class SoccerGame {

    public function __construct(SoccerGameTeam $teamOne, SoccerGameTeam $teamTwo) {
    	$this->teamOne = $teamOne;
    	$this->teamTwo = $teamTwo;
    }

    public function StartGame() {
        $this->calcTeamOneAttacks();
        $this->calcTeamTwoAttacks();
    }
    
    private function calcTeamOneAttacks(){
        $countSuccessAttacks = ceil($this->getRandomAttackValue() * ($this->teamOne->getAttackPower() * $this->getRandomAttackValue() / $this->teamTwo->getDefense()));
    	$this->results['teamOne']->countSuccessAttacks = $countSuccessAttacks;
    }

    private function calcTeamTwoAttacks(){
		$countSuccessAttacks = ceil($this->getRandomAttackValue() * ($this->teamTwo->getAttackPower() / $this->teamOne->getDefense()));
        $this->results['teamTwo']->countSuccessAttacks = $countSuccessAttacks;
    }    

    public function getResults() {
        return $this->results;
    }

    public function getResultsTotally() {
        if($this->results['teamOne']->countSuccessAttacks == $this->results['teamTwo']->countSuccessAttacks)
        {
            $this->StartGame();
            $this->getResultsTotally();
        }
        return $this->results;
    }    

    private function getRandomAttackValue() {
    	return rand(3,15) / 10 + 1;
    }


}




//количество атак
//количество голов

/*
$Brazil = new SoccerGameTeam('Brazil');
$Brazil->countGames = 104;
$Brazil->scoredGoal = 221;
$Brazil->missedGoal = 102;

$attackPower = $Brazil->getAttackPower();
$defense = $Brazil->getDefense();
echo '<b>' . $Brazil->teamName . '</b>' . ' AttackPower: ' . $attackPower . ' Defense: ' . $defense . '<br/>';

$German = new SoccerGameTeam('German');
$German->countGames = 106;
$German->scoredGoal = 224;
$German->missedGoal = 121;

$attackPower = $German->getAttackPower();
$defense = $German->getDefense();
echo '<b>' . $German->teamName . '</b>' . ' AttackPower: ' . $attackPower . ' Defense: ' . $defense . '<br/>';



$SoccerGame = new SoccerGame($Brazil, $German);
$SoccerGame->StartGame();
$results = $SoccerGame->getResults();
print_r($results);*/