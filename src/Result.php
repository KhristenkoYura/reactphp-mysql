<?php

namespace React\MySQL;

use React\MySQL\Commands\QueryCommand;

class Result {

    public $rows;

    public $insert_id;

    public $affected_rows;


    public function __construct(QueryCommand $command) {
        $this->rows = $command->resultRows;
        $this->insert_id = $command->insertId;
        $this->affected_rows = $command->affectedRows;
    }

    public function all() {
        return $this->rows;
    }


    public function one() {
        return current($this->rows);
    }

    public function column() {
        $res = [];
        foreach($this->rows as $row) {
            $res[] = current($row);
        }
        return $res;
    }

    public function scalar() {
        return current($this->one());
    }

    public function exists() {
        return !empty($this->rows);
    }
}