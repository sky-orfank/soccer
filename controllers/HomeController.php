<?php

class HomeController extends MainController 
{
    public function __construct() {
        parent::__construct();
    }

    public function index($request = false, $args) {  

        $modelSoccerTeam = new SoccerTeam(); 
        $SoccerTeams = $modelSoccerTeam->getAllTeams();
 		//print_r($SoccerTeams[0]['teamName']);die();
        if (!$SoccerTeams) {
            $this->viewRenderer->view('404');
        }      

        $this->viewRenderer->view('index', ['teams' => $SoccerTeams]);   
    }    
}
