<?php

class SoccerTeam extends MainModel 
{   
    public $id;
    public $teamName;
    public $countGames;
    public $scoredGoal;
    public $missedGoal;


    public function fields()
    {
        return array('id', 'teamName', 'countGames', 'scoredGoal', 'missedGoal');
    }
     
    public function getAllTeams()
    {
        try{                   
            $db = $this->db;
            $sql = 'SELECT * FROM ' . $this->table; 
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $rows;
    }

    /*public function getByShortUrlSlug($short_url_slug)
    {
        try{                   
            $db = $this->db;
            $sql = 'SELECT * FROM ' . $this->table . ' WHERE short_url_slug = '. $db->quote($short_url_slug); 
            $stmt = $db->query($sql);
            $row = $stmt->fetch();
        }catch(PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $row;
    }*/
}