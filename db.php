<?php 
class Database {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "schedule";
    private $connection = null;
    
    
        function getConnection(){

            try {
                $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);
                }catch(Exception $e){
                    echo $e->getMessage();
                    die();        

                }
                return $this->connection;
            }

        function select($query) {
            try {
                $this->getConnection();
                $db = $this->connection->prepare($query);
                $db->execute();
                $res = $db->get_result();
                $db->close();
                $this->connection->close();
            }catch(Exception $e) {
                echo $e->getMessage();
                die();
            }
            return $res;
        }

        function select_where($query, $type, ...$param) {
            try {
                $this->getConnection();
                $db = $this->connection->prepare($query);
                $db->bind_param($type, ...$param);
                $db->execute();
                $res = $db->get_result();
                $db->close();
                $this->connection->close();
            }catch(Exception $e) {
                echo $e->getMessage();
                die();
            }
            return $res;
        }

        function insert_data($query, $type,...$param)
        {
            try {
                $this->getConnection();
                $db = $this->connection->prepare($query);
                $db->bind_param($type, ...$param);
                $db->execute();
                $res = $db->insert_id;
                $db->close();
                $this->connection->close();
            } catch(Exception $e) {
                echo $e->getMessage("HTTP/1.1 404 URL Not found");
                die();
            }
            return $res;
        }



  }
    
    




?>