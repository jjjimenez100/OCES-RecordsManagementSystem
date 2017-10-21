<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 10/18/2017
 * Time: 3:20 PM
 */
namespace OCES;
/**
 * Class SQL
 * @package OCES
 */
trait DBHelper{
    private $dbName;
    private $dbUserName;
    private $dbPassword;
    private $host;
    private $charset;
    private $connectionString;
    /**
     * @var \PDO
     */
    private $pdoInstance;

    /**
     * @param $host host address of db ; ex 127.0.0.1
     * @param $dbName database name
     * @param string $dbUserName username credential for db
     * @param string $dbPassword password credential for db
     * @param $charset global charset to be used
     */
    function setAttributes($host, $dbName, string $dbUserName, string $dbPassword, $charset = null){
        if($charset != null){
            $this->charset = $charset;
        }
        else{
            $this->charset = "utf8mb4";
        }
        $this->host = $host;
        $this->dbPassword = $dbPassword;
        $this->dbUserName = $dbUserName;
        $this->dbName = $dbName;
        $this->connectionString = "mysql:host=$host;dbname=$dbName;charset=$charset";
    }

    /**
     * @return bool|string returns true if pdo connection was established, else returns a string exception msg
     */
    function connect(){
        try{
            $this->pdoInstance = new \PDO($this->connectionString, $this->dbUserName, $this->dbPassword);
            $this->pdoInstance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            error_reporting(E_ALL);
            ini_set('display_errors', 1); //change value to 0 on deployment server
            //ini_set('log_errors', 1); deployment

            return true;
        }

        catch (\PDOException $exception){
            return $exception->getMessage();
        }
    }

    /**
     * @param string $tableName
     * @param array $columnNames columns to be matched for each where clauses, IN ORDER
     * @param array $parameters parameters to be used for each where clauses, IN ORDER
     * @param null $specificColumn select a specific columnn, use wildcard * to select all columns
     * @return array the result set of the executed query, returns empty if none was returned
     * ex: select("users", "*");
     * selects all rows from table users
     * ex. select("users", "username");
     * selects username column from all rows
     * ex. select("users", "*", ["name", "email], ["joshua", "kek@gmail.com"]);
     * selects all rows from table users where name = "joshua", and email = "kek@gmail.com"
     */
    function select(string $tableName, $specificColumn, $columnNames = [], $parameters = []){
        $selectString = "SELECT " . $specificColumn. " FROM " . $tableName;

        if($columnNames == null){
            $query = $this->pdoInstance->query($selectString);
            return $query->fetchAll();
        }

        $selectString .= " WHERE " . $columnNames[0] . " = ?";
        if(count($columnNames) > 1){
            for($index = 1; $index<count($columnNames); $index++){
                $selectString .= " AND " . $columnNames[$index] . " = ?";
            }
        }

        $query = $this->pdoInstance->prepare($selectString);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    /**
     * @param string $tableName
     * @param array $columns columns to be updated, IN ORDER
     * @param array $parameters values to be used to replace the ? holder, IN ORDER
     * @param $matchingColumn column to be matched
     * @return int returns the number of affected rows
     * ex: update(users, ["username", "password"], ["joshua", "123", 1], "id");
     * update table users, set username = joshua and password = 123 WHERE id = 1;
     * this function does not support multiple where clauses atm.
     */
    function update(string $tableName, $columns = [], $parameters = [], $matchingColumn){
        $updateString = "UPDATE " . $tableName . " SET " . $columns[0] . "= ?";
        if(count($columns)>1){
            for($index = 1; $index<count($columns); $index++){
                $updateString .= ", " . $columns[$index] . " = ?";
            }
        }
        $updateString .= " WHERE " . $matchingColumn . " =?";
        $query = $this->pdoInstance->prepare($updateString);
        $query->execute($parameters);

        return $query->rowCount();
    }

    /**
     * @param string $tableName
     * @param array $columnNames columns to be used for the condition, IN ORDER
     * @param array $parameters matching parameters to be used for each column, IN ORDER
     * @return int returns the number of affected rows
     * ex: delete(users, ["username", "password"], ["joshua", "123"]
     * delete from table users, where username = joshua, and password = 123
     */
    function delete(string $tableName, $columnNames = [], $parameters = []){
        $deleteString = "DELETE FROM " . $tableName;

        $deleteString .= " WHERE " . $columnNames[0] . " = ?";
        if(count($columnNames) > 1){
            for($index = 1; $index<count($columnNames); $index++){
                $deleteString .= " AND " . $columnNames[$index] . " = ?";
            }
        }
        $query = $this->pdoInstance->prepare($deleteString);
        $query->execute($parameters);

        return $query->rowCount();
    }


    /**
     * @param string $customQuery show tables, complex select statements, etc.
     * @param array $parameters can be null. ex: no parameters are required for a show table query
     * @return \PDOStatement
     */
    function customQuery(string $customQuery, $parameters = []){
        $query = $this->pdoInstance->prepare($customQuery);
        $query->execute($parameters);
        return $query;
    }

    /**
     * @param string $tableName
     * @param array $columns
     * @param array $values
     * @return int number of affected rows
     * ex: insert("users", ["name", "college"], ["joshua", "cict]);
     */
    function insert(string $tableName, $columns = [], $values = []){
        $insertString = "INSERT INTO " . $tableName . " (" . $columns[0];
        //INSERT INTO TABLENAME (SAMPLE
        for($index = 1; $index < count($columns); $index++){
            $insertString .= ", " . $columns[$index];
            //INSERT INTO TABLENAME (SAMPLE, SAMPLE
            //INSERT INTO TABLENAME (SAMPLE, SAMPLE, SAMPLE
        }
        $insertString .= ") VALUES(?";

        for($index = 1; $index < count($values); $index++){
            $insertString .= ", ?";
            //INSERT INTO TABLENAME (SAMPLE, SAMPLE, SAMPLE) VALUES(?, ?, ?
        }
        $insertString .= ")";

        $query = $this->pdoInstance->prepare($insertString);
        $query->execute($values);

        return $query->rowCount();
    }

    /**
     * @return string the last inserted id of the pdoinstance
     * note: only limited with the current session of the pdoinstance.
     */
    function getLastInsertedId(){
        return $this->pdoInstance->lastInsertId();
    }

    /**
     * @return array list of all supported pdo drivers
     */
    function getSupportedDrivers(){
        return \PDO::getAvailableDrivers();
    }
}
?>