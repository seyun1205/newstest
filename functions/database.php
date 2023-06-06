<?php

class DatabaseConnection {
    private $hostname = "10.18.57.16";
    private $database = "H_092220138";
    private $username = "H_092220138";
    private $password = "020308";
    private $connection = null;

    public function __construct() {
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password);
        if (!$this->connection) {
            die(mysqli_connect_error());
        }
        mysqli_query($this->connection, "set names 'utf8'");
        mysqli_select_db($this->connection, $this->database) or die(mysqli_error($this->connection));
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        if ($this->connection) {
            mysqli_close($this->connection) or die(mysqli_error($this->connection));
        }
    }
}

// Usage:
$database_connection = new DatabaseConnection();

?>