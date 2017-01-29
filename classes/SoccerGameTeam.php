<?php
class SoccerGameTeam {

	public $teamName;
	public $countGames;
	public $scoredGoal;
	public $missedGoal;
    public $teamId;

    public function __construct($teamName) {
    	$this->teamName = $teamName;
    }
    
    public function getAttackPower() {
        return $this->scoredGoal / $this->countGames;
    }

    public function getDefense() {
    	return $this->missedGoal / $this->countGames;
    }

}