<?php
    require_once("DbConfig.php");

    class IDbWrapper {
        public DbConfig $_dbConfig;
        public PDO $_connection;

        function __construct(DbConfig $dbConfig) {
            $this->setDbConfig($dbConfig);
        }

        function _buildPDOConnection() {
            $this->_connection = new PDO("mysql:host={$this->_dbConfig->hostname};port={$this->_dbConfig->port};dbname={$this->_dbConfig->schema}",
                $this->_dbConfig->usrname, $this->_dbConfig->password);
        }

        /**
         * Returns the current pdo connection
         * @return PDO
         */
        function getConnection() {
            return $this->_connection;
        }

        /**
         * Assigns a new db config to this wrapper and reinitializes the PDO connection.
         * @param DbConfig $_dbConfig
         * @return IDbWrapper
         */
        function setDbConfig(DbConfig $_dbConfig) {
            $this->_dbConfig = $_dbConfig;
            $this->_connection = $this->_buildPDOConnection();
            return $this;
        }
    }
