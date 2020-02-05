<?php

namespace App\Models;

class Manager {
    protected $table;
    protected $pdo;
    public function __construct($table) {
        $this->table = $table;
        $this->pdo = new \PDO("mysql:host=localhost;dbname=wiitheure", "root", "root");
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
        foreach ($option as $key => $value) {
            if ($key >= 1) {
                $values .= " AND ". $value["field"] ."=\"".$value["value"]."\"";
            } else {
                $values .= " ".$value["field"]."=\"". $value["value"]."\"";
            }
        }
        $req = $this->pdo->prepare("DELETE FROM ". $this->table ." WHERE". $values .";");
        $req->execute();
    }
    public function insert(array $option) {
        $values = "";
        $fields = "";
        foreach ($option as $key => $value) {
            if ($key >= 1) {
                $values .= ", \"".$value["value"]."\"";
                $fields .= ", \"".$value["field"]."\"";
            } else {
                $values .= "\"".$value["field"]."\"";
                $fields .= "\"".$value["field"]."\"";
            }
        }
        $req = $this->pdo->prepare("INSERT INTO ". $this->table ." (". $fields .") VALUES (". $values .");");
        $req->execute();
    }
    /**
     * option [
     *      [
     *          field => "name",
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
        foreach ($where as $key => $value) {
            if ($key >= 1) {
                $wheres .= " AND ". $value["field"] ."=\"".$value["value"]."\"";
            } else {
                $wheres .= " ".$value["field"]."=\"". $value["value"]."\"";
            }
        }
        foreach ($option as $key => $value) {
            if ($key >= 1) {
                $values .= " ,". $value["field"] ."=\"".$value["value"]."\"";
            } else {
                $values .= " ".$value["field"]."=\"". $value["value"]."\"";
            }
        }
        $req = $this->pdo->prepare("UPDATE ". $this->table ." SET ". $values ." WHERE ". $wheres.";");
        $req->execute();
    }
    public function find(array $option) {
        $values = "";
        foreach ($option as $key => $value) {
            if ($key >= 1) {
                $values .= " AND ". $value["field"] ."=\"".$value["value"]."\"";
            } else {
                $values .= " ".$value["field"]."=\"". $value["value"]."\"";
            }
        }
        $req = $this->pdo->prepare("SELECT * FROM ". $this->table ." WHERE ".$values.";");
        $req->execute();
        return $req->fetchAll();
    }
    public function findAll() {
        $req = $this->pdo->prepare("SELECT * FROM ". $this->table);
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