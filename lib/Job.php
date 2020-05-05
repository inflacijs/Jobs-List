<?php

class Job{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get All Jobs
    public function getAllJobs(){
        $this->db->query("SELECT jobs.*, categories.name AS cname
                    FROM jobs
                    INNER JOIN categories 
                    ON jobs.category_id = categories.id  -- Foreign key -- 
                    ORDER BY post_date DESC
                    ");
        //Asign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

}