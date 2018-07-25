<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PDODB implements Interface_DAO {

    private $host; // 主机地址
    private $port; // 端口号
    private $user; // 用户名
    private $pass; // 密码
    private $charset; // 字符集
    private $dbname; // 数据库名
    private $dsn;
    private $pdo;
    private static $instance;
    
    private function __construct($arr) {
        $this->initParam($arr);
        $this->initDSN();
        $this->initPDO();
        $this->initAttribute();
    }
    public function fetchAll($sql) {
        try{
            $stmt = $this->pdo->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            $this->my_error($ex);
        }
        return $result;
    }

    public function fetchColumn($sql) {
        try {
            $stmt = $this->pdo->query($sql);
            $result = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            $this->my_error($ex);
        }
        return $result;
    }

    public function fetchRow($sql) {
        try {
            $stmt = $this->pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            $this->my_error($ex);
        }
        return $result;
    }

    public function my_query($sql) {
        try{
            $result = $this->pdo->exec($sql);
            return $result;
        } catch (PDOException $ex) {
            $this->my_error($ex);
        }
    }

    public static function getInstance($config) {
        if(!self::$instance instanceof self)
            self::$instance = new self($config);
        return self::$instance;
    }
    
    private function initParam($arr) {
        $this->host = isset($arr['host']) ? $arr['host'] : '127.0.0.1';
        $this->port = isset($arr['port']) ? $arr['port'] : '3306';
        $this->user = isset($arr['user']) ? $arr['user'] : 'root';
        $this->pass = isset($arr['pass']) ? $arr['pass'] : '';
        $this->charset = isset($arr['charset']) ? $arr['charset'] : 'utf8';
        $this->dbname = isset($arr['dbname']) ? $arr['dbname'] : '';
    }

    private function initDSN(){
        $this->dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=$this->charset";
    }
    
    private function initPDO(){
        try{
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass);
        } catch (PDOException $ex) {
            $this->my_error($ex);
        }
    }
    
    private function initAttribute(){
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    
    private function my_error($ex) {
        echo '数据库连接错误！<br/>';
        echo '错误信息为：' . $ex->getMessage() . '<br/>';
        echo '错误码为：' . $ex->getCode() . '<br/>';
        echo '错误脚本为：' . $ex->getFile() . '<br/>';
        echo '错误的行号为：' . $ex->getLine();
        return FALSE;
    }

    private function __clone() {
        ;
    }
}
