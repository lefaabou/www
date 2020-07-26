<?php
    class Voisin{

        // Connection
        private $conn;

        // Table
        private $db_table = "Voisin";

        // Columns
        public $id;
        public $name;
        public $phone;
        public $address;
        public $about;
        public $favoris;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getVoisin(){
            $sqlQuery = "SELECT id, name, phone, address, about FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // GET FAV
        public function getVoisinFav(){
            $sqlQuery = "SELECT id, name, phone, address, about FROM " . $this->db_table . " WHERE favoris =1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createVoisin(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        phone = :phone, 
                        address = :address, 
                        about = :about";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->phone=htmlspecialchars(strip_tags($this->phone));
            $this->address=htmlspecialchars(strip_tags($this->address));
            $this->about=htmlspecialchars(strip_tags($this->about));
           
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":address", $this->address);
            $stmt->bindParam(":about", $this->about);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleVoisin(){
            $sqlQuery = "SELECT
                        id, 
                        name, 
                        phone, 
                        address, 
                        about, 
                        favoris
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->name = $dataRow['name'];
            $this->phone = $dataRow['phone'];
            $this->address= $dataRow['address'];
            $this->about = $dataRow['about'];
            $this->favoris = $dataRow['favoris'];
        }        

        // UPDATE
        public function updateVoisin(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        
                        favoris = :favoris
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            
            $this->favoris=htmlspecialchars(strip_tags($this->favoris));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
           
            $stmt->bindParam(":favoris", $this->favoris);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteVoisin(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>