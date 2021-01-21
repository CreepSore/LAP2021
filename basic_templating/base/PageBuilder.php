<?php
    class PageBuilder {
        public array $_segments;
        public string $_layout;

        function set(string $segmentName, string $segmentData) {
            $this->_segments[$segmentName] = $segmentData;
        }

        function get(string $segmentName) {
            return $this->_segments[$segmentName];
        }

        function renderView(string $view, string $layout) {
            $file = __ROOT__ . "/custom/layout/$layout.php";
        }

        function setLayout(string $layoutName) {
            $this->_layout = $layoutName;
            return $this;
        }

    }