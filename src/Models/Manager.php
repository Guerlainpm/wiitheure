<?php

namespace App\Models;

class Manager {
    protected $table;
    protected $pdo;
    public function __construct($table) {
        $this->table = $table;
        $this->pdo = new \PDO("mysql:host=localhost;dbname=wiitheure;", "root", "root");
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    /**
     * option [
     *      [
     *          field => "id",
     *          value => 1
     *      ]
     * ]
     */
    public function delete(array $option) {
        $values = "";
        $index = 0;
        foreach ($option as $field => $value) {
            if ($index >= 1) {
                $values .= " AND ". $field ."=\"".$value."\"";
            } else {
                $values .= " ".$field."=\"". $value."\"";
            }
            $index ++;
        }
        $req = $this->pdo->prepare("DELETE FROM ". $this->table ." WHERE". $values .";");
        $req->execute();
    }
    public function insert(array $option) {
        $values = "";
        $fields = "";
        $exec = [];
        $index = 0;
        foreach ($option as $field => $value) {
            if ($index >= 1) {
                $fields .= ", ".$field;
                $values .= ", :".$field;
            } else {
                $fields .= $field;
                $values .= " :".$field;
            }
            $exec = array_merge($exec, [$field => $value]);
            $index ++;
        }
        $req = $this->pdo->prepare("INSERT INTO ". $this->table ." (". $fields .") VALUES (". $values .");");
        $req->execute($exec);
    }
    /**
     * option [
     *
     *          "username" => "name",
     *      ]
     * ]
     * where [
     *      [
     *          id => "1",
     *      ]
     * ]
     */
    public function update(array $option, array $where) {
        $whereReq = "";
        $values = "";
        $index = 0;
        foreach ($where as $field => $value) {
            if ($index >= 1) {
                $whereReq .= " AND ". $field ."=\"".$value."\"";
            } else {
                $whereReq .= " ".$field."=\"". $value."\"";
            }
            $index++;
        }
        $index = 0;
        foreach ($option as $field => $value) {
            if ($index >= 1) {
                $values .= " ,". $field ."=\"".$value."\"";
            } else {
                $values .= " ".$field."=\"". $value."\"";
            }
            $index++;
        }
        $req = $this->pdo->prepare("UPDATE ". $this->table ." SET ". $values ." WHERE ". $whereReq.";");
        $req->execute();
    }
    public function find(array $option, $classPath = null) {
        $whereReq = "";
        $index = 0;
        foreach ($option as $field => $value) {
            if ($index >= 1) {
                $whereReq .= " AND ". $field ."=\"".$value."\"";
            } else {
                $whereReq .= " ".$field."=\"". $value."\"";
            }
            $index++;
        }
        $req = $this->pdo->prepare("SELECT * FROM ". $this->table ." WHERE ".$whereReq.";");
        if (isset($classPath)) {
            $req->setFetchMode(\PDO::FETCH_CLASS, $classPath);
        }
        $req->execute();
        return $req->fetchAll();
    }
    public function findAll($classPath = null) {
        $req = $this->pdo->prepare("SELECT * FROM ". $this->table);
        if (isset($classPath)) {
            $req->setFetchMode(\PDO::FETCH_CLASS, $classPath);
        }
        $req->execute();
        return $req->fetchAll();
    }
    public function redirect($url)
    {
        header("Location: ".$url);
        exit();
    }
    /**
     * Get the value of table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set the value of table
     *
     * @return  self
     */
    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }
}
