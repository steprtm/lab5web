<?php

class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct() {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig() {
        require_once("config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where=null) {
        $sql = "SELECT * FROM ".$table.($where ? " WHERE ".$where : "");
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function insert($table, $data) {
        if (is_array($data)) {
            $columns = implode(",", array_keys($data));
            $values = implode(",", array_map(function($value) { return "'{$value}'"; }, array_values($data)));
            $sql = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
            $result = $this->conn->query($sql);
            return $result === true;
        }
        return false;
    }

    public function update($table, $data, $where) {
        if (is_array($data)) {
            $update_values = array_map(function($key, $val) {
                return "$key='{$val}'";
            }, array_keys($data), array_values($data));

            $update_statement = implode(",", $update_values);
            $sql = "UPDATE ".$table." SET ".$update_statement." WHERE ".$where;
            $result = $this->conn->query($sql);
            return $result === true;
        }
        return false;
    }

    public function delete($table, $filter) {
        $sql = "DELETE FROM ".$table." WHERE ".$filter;
        $result = $this->conn->query($sql);
        return $result === true;
    }
}
