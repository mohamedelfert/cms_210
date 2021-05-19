<?php


class Pagination extends MysqliConnect{

    public function totalPages($table,$per_page){
        $this->query('id', $table);
        $this->execute();
        $count = $this->rowCount();
        $count_pages = ceil($count / $per_page);
        return $count_pages;
    }
}