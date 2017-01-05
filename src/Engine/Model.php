<?php

namespace Gumunia\Diary\Engine;

use \PDO;

/**
 * This class includes methods for models.
 *
 * @abstract
 */
abstract class Model
{

    /**
     * object of the class PDO
     *
     * @var object
     */
    protected $pdo;

    /**
     * It sets connect with the database.
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                    'mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASSOWD, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    )
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }
    }

    /*
     * 
     * string @table
     * string @quantity
     * array_assoc ('table_field', 'value') @where
     * string ($filed ASC/DESC) @order
     * int @limit
     * 
     * return array
     */
    public function select($table, $quantity = '*', array $where = NULL,
            $order = NULL, $limit = NULL)
    {
        $query = 'SELECT ' . $quantity . ' FROM ' . $table;

        if ($where != NULL) {
            $query .= ' WHERE ' . self::arrayToQuery($where);
        }
        if ($order != NULL) {
            $query .= ' ORDER BY ' . $order;
        }
        if ($limit != NULL) {
            $query .= ' LIMIT ' . $limit;
        }
        $prepared = $this->getReady($query);
        if ($where != NULL) {
            $stmt = self::bind($where, $prepared);
            $row = self::getRow($stmt);
                    
            return $row[0];
        }
        $row = self::getRow($prepared);
                
        return $row[0];
    }

    /*
     * 
     * string @table
     * array assoc $data
     */
    public function insert($table, array $data)
    {
        $query = 'INSERT INTO ' . $table . ' (' . self::getParamsIndex($data) . ') VALUES (' . self::getParamsIndexToBind($data) . ')';
        $ready = self::getReady($query);
        $stmt = self::bind($data, $ready);

        return $stmt->execute();
    }

    /*
     * string @table
     * int @id
     */
    public function delete($table, $id)
    {
        $query = 'DELETE FROM ' . $table . ' WHERE id = :id';
        $stmt = self::getReady($query);
        $stmt->bindValue(':id', $id);

        return $result = $stmt->execute();
    }

    /*
     * string @table
     * array assoc @data
     * int @id
     */
    public static function update($table, array $data, $id)
    {
        $query = 'UPDATE ' . $table . ' SET ' . self::arrayToQuery($data) . ' WHERE id = :id';
        $ready = self::getReady($query);
        $stmt = self::bind($data, $ready);
        $stmt->bindValue(':id', $id);

        $stmt->execute();


        return true;
    }

    private function getReady($query)
    {
        return $stmt = $this->pdo->prepare($query);
    }

    private static function getRow($stmt)
    {
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!$row) {
            return false;
        }

        return $row;
    }

    private static function bind(array $data, $stmt)
    {
        foreach ($data as $db_index => $value) {
            $stmt->bindValue(':' . $db_index, $value);
        }

        return $stmt;
    }

    /*
     *  return string 'index=:index, index2=:index2, index3=:index3 '
     */
    private static function arrayToQuery(array $data)
    {

        $indexs = array_keys($data);
        foreach ($indexs as &$param) {
            $param .= '=:'. $param;
        }
        unset($param);

        return implode(', ', $indexs) . " ";
    }

    /*
     * return string 'index, index2, index3'
     */
    private static function getParamsIndex(array $data)
    {

        return implode(', ', array_keys($data));
    }

    /*
     * return string ':index, :index2, :index3'
     */
    private static function getParamsIndexToBind(array $data)
    {
        $indexs = array_keys($data);
        foreach ($indexs as &$param) {
            $param = ':' . $param;
        }
        unset($param);

        return implode(', ', $indexs);
    }

    // string @prefix value = '=:' , ':'
    private static function paramsConverter($data, $prefix)
    {
        
    }

}
