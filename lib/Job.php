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

    //Create Job
    public function create($data){
        //Insert Query
            $this->db->query("INSERT INTO jobs (category_id, job_title,
                 company, description, location, salary, contact_user, 
                 contact_email)
            VALUES (:category_id, :job_title, :company, :description, 
                :location, :salary, :contact_user, :contact_email)" );
                //Bind data
            $this->db->bind(':category_id', $data['category_id']);
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':contact_user', $data['contact_user']);
            $this->db->bind(':contact_email', $data['contact_email']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
    }

    public function delete($id){
            //Delete Query
                $this->db->query("DELETE FROM jobs WHERE id = $id" );
            //Bind data
            
            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
    }

    public function update($id, $data){
                //Update Query
        $this->db->query("UPDATE jobs
                SET 
                category_id = :category_id,
                job_title = :job_title,
                company = :company,
                description = :description,
                location = :location,
                salary = :salary,
                contact_user = :contact_user,
                contact_email = :contact_email 
                WHERE id = $id");
            //Bind data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}