<?php
    class Router {
        public array $_pageRegister = array();
        public array $_wrapperRegister = array();

        /**
         * Registers a Page with a specified key into the page register.
         * @param string $pageKey
         * @param string $filePath Path to the view relative of the [custom/views/] folder
         * @return Router
         */
        function registerPage(string $pageKey, string $filePath) {
            $this->_pageRegister[$pageKey] = $filePath;
            return $this;
        }

        function registerDbWrapper(string $wrapperKey, IDbWrapper $wrapper) {
            $this->_wrapperRegister[$wrapperKey] = $wrapper;
            return $this;
        }

        /**
         * Returns a db wrapper from the wrapper register.
         * @param string $wrapperKey
         * @return IDbWrapper
         */
        function getDbWrapper(string $wrapperKey) {
            $wrapper = $this->_wrapperRegister[$wrapperKey];

            if(!$wrapper) {
                throw new Error("Wrapper with key [$wrapperKey] could not be found!");
            }

            return $wrapper;
        }
    }
