<?php
    include "../config/database.php";

    class dbcon {

        protected $_config;

        public $dbh; 

        public function __construct(array $config) {
            $this->_config = $config;
            $this->getPDOConnection();
        }

        public function __destruct() {
            $this->dbh = NULL;
        }

        public function getPDOConnection() {
            if ($this->dbh == NULL) {
                $dsn = "".$this->_config['driver'].":host=".$this->_config['host'].";dbname=".$this->_config['dbname'];

                try {
                    $this->dbh = new PDO($dsn, $this->_config['username'], $this->_config['password']);
                } catch (PDOException $e) {
                    echo __LINE__.$e->getMessage();
                }
            }
        }
    }
?>