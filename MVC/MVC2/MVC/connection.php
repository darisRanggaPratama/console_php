<?php
class Connection{
    private $hostname = "localhost";
    private $username = "rangga";
    private $password = "rangga";
    private $dbname = "test";

    public function connect(){
        return new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
    }
}
