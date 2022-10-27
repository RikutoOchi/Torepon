<?php
  require_once __DIR__ . '/dbdata.php';

  class Transaction_information_data extends DbData{
     public function getRecord_transaction_information_data($table1,$table2,$table3,$culum1,$culum2,$culum3,$value) {
        $sql = "select * from (($table1 left outer join $table2 on $table1.$culum1 = $table2.$culum2) left outer join $table3 on $table2.$culum3 = $table3.$culum3)
                where $table1.$culum1 = ?";
        $stmt = $this->query($sql, [$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }
