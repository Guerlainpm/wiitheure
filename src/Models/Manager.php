<?php

namespace App\Models;

class Manager {
    protected $table;
    protected $pdo;
    public function __construct($table) {
        $this->table = $table;
        $this->pdo = new \PDO("mysql:host=localhost;dbname=wiitheure", "root", "root");
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
        foreach ($option as $field => $value) {
            if ($key >= 1) {
                $values .= " AND ". $field ."=\"".$value."\"";
            } else {
                $values .= " ".$field."=\"". $value."\"";
            }
        }
        $req = $this->pdo->prepare("DELETE FROM ". $this->table ." WHERE". $values .";");
        $req->execute();
    }
    public function insert(array $option) {
        $values = "";
        $fields = "";
        $exec = [];
        $nb = 0;
        foreach ($option as $field => $value) {
            if ($nb >= 1) {
                $fields .= ", ".$field;
                $values .= ", :".$field;
            } else {
                $fields .= $field;
                $values .= " :".$field;
            }
            $exec = array_merge($exec, [$field => $value]);
            $nb ++;
        }
        $req = $this->pdo->prepare("INSERT INTO ". $this->table ." (". $fields .") VALUES (". $values .");");
        $req->execute($exec);
    }
    /**
     * option [
     * 
     *          "username" => "name",
     *          value => "colin"
     *      ]
     * ]
     * where [
     *      [
     *          field => "id",
     *          value => 3
     *      ]
     * ]
     */
    public function update(array $option, array $where) {
        $wheres = "";
        $values = "";
        $nbW = 0;
        foreach ($where as $field => $value) {
            if ($nbW >= 1) {
                $wheres .= " AND ". $field ."=\"".$value."\"";
            } else {
                $wheres .= " ".$field."=\"". $value."\"";
            }
            $nbW++;
        }
        $nb = 0;
        foreach ($option as $field => $value) {
            if ($nb >= 1) {
                $values .= " ,". $field ."=\"".$value."\"";
            } else {
                $values .= " ".$field."=\"". $value."\"";
            }
            $nb++;
        }
        $req = $this->pdo->prepare("UPDATE ". $this->table ." SET ". $values ." WHERE ". $wheres.";");
        $req->execute();
    }
    public function find(array $option, $classPath = null) {
        $values = "";
        $nb = 0;
        foreach ($option as $field => $value) {
            if ($nb >= 1) {
                $values .= " AND ". $field ."=\"".$value."\"";
            } else {
                $values .= " ".$field."=\"". $value."\"";
            }
            $nb++;
        }
        $req = $this->pdo->prepare("SELECT * FROM ". $this->table ." WHERE ".$values.";");
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