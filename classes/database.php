<?php



    class Database {
        private $server_name = "localhost";
        private $username = "root";
        private $password = "root";  //For windows users, password is blank
        private $db_name = "the_company";
        protected $conn;

        public function __construct() {
            $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);
            // protected ＄conn which holds the connection to the database.
            //use $this->conn each time you interact with the database.

            if($this->conn->connect_error) {
                die("Unable to connect to database" . $this->db_name. ":" . $this->conn->connect_error);
            }
        }
        
            
     }
        //Delete later
     $db = new Database;
    

     //何もclassesのブラウザに載っていなかったら成功
     // 例えば、$db_name = "the_companysfdga" とかだったら　　warning unkouwn database "the_companysfdga" と表示される

?>