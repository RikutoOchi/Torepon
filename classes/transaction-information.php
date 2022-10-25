<?php
  require_once __DIR__ . '/dbdata.php';

  class Transaction_information_data extends DbData{
     public function getRecord_transaction_information_data($table1,$table2,$colum1,$culum2,$value) {
        $sql = "select * from $table1 left outer join $table2 on $table1.$colum1 = $table2.$culum2 where $table1.$colum1 = ?";
        $stmt = $this->query($sql, [$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }