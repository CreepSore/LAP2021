<?php
    class DbConfig {
        public string $hostname = 'localhost';
        public int $port = 3306;

        public string $username = 'undefined';
        public string $password = 'undefined';
        public string $schema = 'undefined';

        function setHostname(string $hostname) {
            $this->hostname = $hostname;
            return $this;
        }

        function setPort(int $port) {
            $this->port = $port;
            return $this;
        }

        function setCredentials(string $username, string $password) {
            $this->username = $username;
            $this->password = $password;
            return $this;
        }

        function setSchema(string $schema) {
            $this->schema = $schema;
            return $this;
        }
    }
