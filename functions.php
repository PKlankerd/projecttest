<?php 

    define('DB_SERVER', 'localhost'); // Your hostname
    define('DB_USER', 'root'); // Database Username
    define('DB_PASS', ''); // Database Password
    define('DB_NAME', 'phpcrud'); // Database Name

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        }

        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username = '$uname'");
            return $checkuser;
        }

      
        public function signin($uname, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT id, fullname FROM tblusers WHERE username = '$uname' AND password = '$password'");
            return $signinquery;
        }
        public function insert($fname, $lname, $age) {
            $result = mysqli_query($this->dbcon, "INSERT INTO members(Firstname, Lastname, Age) VALUES('$fname', '$lname', '$age')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM members");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM members WHERE id = '$userid'");
            return $result;
        }
        
        public function update($fname, $lname, $age, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE members SET 
                Firstname = '$fname',
                Lastname = '$lname',
                Age = '$age'
               
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM members WHERE id = '$userid'");
            return $deleterecord;
        }
    }

?>