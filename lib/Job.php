<!-- Šis strādā līdzīgi kā model -->
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

    public function getCategories(){
        $this->db->query("SELECT * FROM categories");
        //Asign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    // Get jobs By Category

    public function getByCategory($category){

        $this->db->query("SELECT jobs.*, categories.name AS cname
                    FROM jobs
                    INNER JOIN categories 
                    ON jobs.category_id = categories.id  -- Foreign key -- 
                    WHERE jobs.category_id = $category
                    ORDER BY post_date DESC
        ");
        //Asign Result Set
        $results = $this->db->resultSet();

        return $results;  
    }

    //Get category
    public function getCategory($category_id) {
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");

        $this->db->bind(':category_id', $category_id);

        // Assign Row
        $row = $this->db->single();

        return $row;

    }


    //Get job

    public function getJob($id){
        $this->db->query("SELECT * FROM jobs WHERE id = :id");

        $this->db->bind(':id', $id);

        // Assign Row
        $row = $this->db->single();

        return $row;

    }

}