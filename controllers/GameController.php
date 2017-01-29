<?php

class GameController extends MainController 
{
    public function runToss($request = false, $args) 
    {           
        $modelSoccerTeam = new SoccerTeam(); 
        $SoccerTeams = $modelSoccerTeam->getAllTeams();

        shuffle($SoccerTeams);

        $literals = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

        $k = 0;
        for($i=0; $i<count($SoccerTeams); $i++) {

            if (($i>3) && ($i % 4 == 0)) // false, 13%5=3
            {
                $k++;
            }

            $SoccerTeamsGrouped[$literals[$k]][] = $SoccerTeams[$i];
        }

        if (!$SoccerTeams) {
            $this->viewRenderer->view('404');
        }      

        $this->viewRenderer->view('runtoss', ['teams' => $SoccerTeamsGrouped]);
    }

    public function getGroupsResult($request = false, $args) 
    {           
        $groups = $request['groups'];
        foreach($groups as $k=>$v) {


            foreach($groups[$k] as $teamId) {
                
                $modelSoccerTeam = new SoccerTeam(); 
                $SoccerTeam = $modelSoccerTeam->getById($teamId);
                
                $teams[$k][$SoccerTeam['id']] = new SoccerGameTeam($SoccerTeam['teamName']);
                $teams[$k][$SoccerTeam['id']]->countGames = $SoccerTeam['countGames'];
                $teams[$k][$SoccerTeam['id']]->scoredGoal = $SoccerTeam['scoredGoal'];
                $teams[$k][$SoccerTeam['id']]->missedGoal = $SoccerTeam['missedGoal'];

                $attackPower = $teams[$k][$SoccerTeam['id']]->getAttackPower();
                $defense = $teams[$k][$SoccerTeam['id']]->getDefense();
            }





            foreach($groups[$k] as $teamId) {

                foreach($groups[$k] as $teamOpponentId) {
                    if($teamOpponentId!==$teamId) {
                        $add = true;
                        foreach($this->results[$k] as $item){

                            if(($item['opponent1'] == $teamOpponentId && $item['opponent2'] == $teamId) || ($item['opponent1'] == $teamId && $item['opponent2'] == $teamOpponentId)) {
                                $add = false;
                            } 
                        }
                        if($add) {
                            $SoccerGame = new SoccerGame($teams[$k][$teamId], $teams[$k][$teamOpponentId]);
                            $SoccerGame->StartGame();
                            $gameResult = $SoccerGame->getResults();
                            $this->results[$k][] = ['opponent1' => $teamId, 'opponent2' => $teamOpponentId, 'teamNameOpponent1' => $teams[$k][$teamId]->teamName, 'teamNameOpponent2' => $teams[$k][$teamOpponentId]->teamName, 'goalsOpponent1' => $gameResult['teamOne']->countSuccessAttacks, 'goalsOpponent2' => $gameResult['teamTwo']->countSuccessAttacks];
                        }
                    }

                }
            }
        }

        foreach($groups as $k=>$v) {

            foreach($groups[$k] as $teamId) {
                
                if(!$data[$k][$teamId]['countWin']) $data[$k][$teamId]['countWin'] = 0;
                if(!$data[$k][$teamId]['countLose']) $data[$k][$teamId]['countLose'] = 0;
                if(!$data[$k][$teamId]['goals']) $data[$k][$teamId]['goals'] = 0;
                if(!$data[$k][$teamId]['goalsLose']) $data[$k][$teamId]['goalsLose'] = 0;
                if(!$data[$k][$teamId]['countStandoff']) $data[$k][$teamId]['countStandoff'] = 0;
                if(!$data[$k][$teamId]['score']) $data[$k][$teamId]['score'] = 0;
                if(!$data[$k][$teamId]['goalsDifference']) $data[$k][$teamId]['goalsDifference'] = 0;

                foreach($this->results[$k] as $result) {
                    if($teamId==$result['opponent1']) {
                        $data[$k][$teamId]['goals'] += $result['goalsOpponent1'];
                        $data[$k][$teamId]['goalsLose'] += $result['goalsOpponent2'];
                        if($result['goalsOpponent1']>$result['goalsOpponent2']) {
                            $data[$k][$teamId]['countWin']++;
                            $data[$k][$teamId]['score']+=3;
                        } elseif($result['goalsOpponent1']<$result['goalsOpponent2']) {
                            $data[$k][$teamId]['countLose']++;
                        } elseif($result['goalsOpponent1']==$result['goalsOpponent2']) {
                            $data[$k][$teamId]['countStandoff']++;
                            $data[$k][$teamId]['score']++;
                        }
                        $data[$k][$teamId]['teamName'] = $result['teamNameOpponent1'];
                        $data[$k][$teamId]['teamId'] = $result['opponent1'];                        
                    }
                    if($teamId==$result['opponent2']) {
                        $data[$k][$teamId]['goals'] += $result['goalsOpponent2'];
                        $data[$k][$teamId]['goalsLose'] += $result['goalsOpponent1'];
                        if($result['goalsOpponent2']>$result['goalsOpponent1']) {
                            $data[$k][$teamId]['countWin']++;
                            $data[$k][$teamId]['score']+=3;
                        } elseif($result['goalsOpponent2']<$result['goalsOpponent1']) {
                            $data[$k][$teamId]['countLose']++;
                        } elseif($result['goalsOpponent2']==$result['goalsOpponent1']) {
                            $data[$k][$teamId]['countStandoff']++;
                            $data[$k][$teamId]['score']++;
                        }
                        $data[$k][$teamId]['teamName'] = $result['teamNameOpponent2'];
                        $data[$k][$teamId]['teamId'] = $result['opponent2'];                                               
                    }     

                    if($teamId==$result['opponent1'] || $teamId==$result['opponent2']) {
                        $data[$k][$teamId]['countGames']++;
                    }
                }    
            }
        }        


        // sort by scores
        foreach($data as $k=>$v) {
            $scores = [];

            foreach($data[$k] as $team) {
                $scores[$team['teamId']] = $team['score'];
            }
            arsort($scores);

            $scoresKeys = array_keys($scores);
            $i = 1;
            foreach($scores as $k1=>$v) {

                if($i==2) {
                    $secondTeam = $data[$k][$k1];
                }

                if($i==3) {
                    $thirdTeam = $data[$k][$k1];
                }

                if(isset($thirdTeam['score']) && $thirdTeam['score']==$secondTeam['score']) {
                    if($thirdTeam['goals']-$thirdTeam['goalsLose']>$secondTeam['goals']-$secondTeam['goalsLose']) {
                        //echo $scoresKeys[1];die();
                        $dataOutput[$k][$scoresKeys[1]] = $data[$k][$scoresKeys[2]];
                        $dataOutput[$k][$scoresKeys[2]] = $data[$k][$scoresKeys[3]];
                        //$dataOutput[$k][$k1] = $data[$k][$k1];// del
                    } else {
                        $dataOutput[$k][$k1] = $data[$k][$k1];
                    }
                } else {
                    $dataOutput[$k][$k1] = $data[$k][$k1];
                }

                $dataOutput[$k][$k1]['goalsDifference'] = $dataOutput[$k][$k1]['goals'] - $dataOutput[$k][$k1]['goalsLose'];

                $i++;
            }

        }

        $this->viewRenderer->view('groupsresult', ['dataGroups' => $dataOutput]);

    }


    public function getHalfPlayOffResult($request = false, $args) 
    {           
        $groups = $request['groups'];

        foreach($groups as $k=>$v) {


            foreach($groups[$k] as $teamId) {


                $modelSoccerTeam = new SoccerTeam(); 
                $SoccerTeam = $modelSoccerTeam->getById($teamId);


                $teams[$SoccerTeam['id']] = new SoccerGameTeam($SoccerTeam['teamName']);
                $teams[$SoccerTeam['id']]->countGames = $SoccerTeam['countGames'];
                $teams[$SoccerTeam['id']]->scoredGoal = $SoccerTeam['scoredGoal'];
                $teams[$SoccerTeam['id']]->missedGoal = $SoccerTeam['missedGoal'];
                $teams[$SoccerTeam['id']]->teamId = $SoccerTeam['id'];

                $attackPower = $teams[$SoccerTeam['id']]->getAttackPower();
                $defense = $teams[$SoccerTeam['id']]->getDefense();
            }

        }

        shuffle($teams);

        for($i=0;$i<count($teams);$i = $i+2) {
            $next = $i+1;

            if(isset($teams[$next])) {
                $SoccerGame = new SoccerGame($teams[$i], $teams[$next]);
                $SoccerGame->StartGame();
                $gameResult = $SoccerGame->getResultsTotally();
                
                if($gameResult['teamOne']->countSuccessAttacks > $gameResult['teamTwo']->countSuccessAttacks) {
                    $winnerId = $teams[$i]->teamId;
                } else {
                    $winnerId = $teams[$next]->teamId;
                }    
                $this->results[] = ['opponent1' => $teams[$i]->teamId, 'opponent2' => $teams[$next]->teamId, 'teamNameOpponent1' => $teams[$i]->teamName, 'teamNameOpponent2' => $teams[$next]->teamName, 'goalsOpponent1' => $gameResult['teamOne']->countSuccessAttacks, 'goalsOpponent2' => $gameResult['teamTwo']->countSuccessAttacks, 'winnerId' => $winnerId];
            }    

        }

        $this->viewRenderer->view('groupsresultplayoff', ['dataresults' => $this->results]);

    }

    public function getPlayOffResults($request = false, $args) 
    {           
        $teamsRequest = $request['teams'];

        foreach($teamsRequest as $teamId) {


            $modelSoccerTeam = new SoccerTeam(); 
            $SoccerTeam = $modelSoccerTeam->getById($teamId);


            $teams[$SoccerTeam['id']] = new SoccerGameTeam($SoccerTeam['teamName']);
            $teams[$SoccerTeam['id']]->countGames = $SoccerTeam['countGames'];
            $teams[$SoccerTeam['id']]->scoredGoal = $SoccerTeam['scoredGoal'];
            $teams[$SoccerTeam['id']]->missedGoal = $SoccerTeam['missedGoal'];
            $teams[$SoccerTeam['id']]->teamId = $SoccerTeam['id'];

            $attackPower = $teams[$SoccerTeam['id']]->getAttackPower();
            $defense = $teams[$SoccerTeam['id']]->getDefense();
        }

        shuffle($teams);

        for($i=0;$i<count($teams);$i = $i+2) {
            $next = $i+1;

            if(isset($teams[$next])) {
                $SoccerGame = new SoccerGame($teams[$i], $teams[$next]);
                $SoccerGame->StartGame();
                $gameResult = $SoccerGame->getResultsTotally();
                
                if($gameResult['teamOne']->countSuccessAttacks > $gameResult['teamTwo']->countSuccessAttacks) {
                    $winnerId = $teams[$i]->teamId;
                } else {
                    $winnerId = $teams[$next]->teamId;
                }    
                $this->results[] = ['opponent1' => $teams[$i]->teamId, 'opponent2' => $teams[$next]->teamId, 'teamNameOpponent1' => $teams[$i]->teamName, 'teamNameOpponent2' => $teams[$next]->teamName, 'goalsOpponent1' => $gameResult['teamOne']->countSuccessAttacks, 'goalsOpponent2' => $gameResult['teamTwo']->countSuccessAttacks, 'winnerId' => $winnerId];
            }    

        }

        $this->viewRenderer->view('groupsresultplayoff', ['dataresults' => $this->results]);

    }
}