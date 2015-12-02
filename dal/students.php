<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/initconfig.php';
include_once 'dal/database.php';

Class Students {

    var $objDb;

    public function __construct() {
        $this->objDb = new db();
    }

    /**
     * @uses This function gives the collection of students' names
     * @return type mysqli resourse
     */
    public function get_names() {
        $sql = " SELECT "
                . " `student_id`,`name` FROM"
                . " students";
        return $this->objDb->ExecuteQuery($sql, 1);
    }

}
