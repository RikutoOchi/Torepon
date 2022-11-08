<?php
  require_once __DIR__ . '/dbdata.php';

  class Tradelist_exhibit extends DbData{
     public function getRecord_tradelist_number_of_transactions ($value) {
        $sql = "select * from exhibits left outer join trades on exhibits.EXHIBIT_ID = trades.TRADE_ID 
                where trades.USER_ID = ? order by TRADE_START_TIME";
        $stmt = $this->query($sql, [$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }

  class Tradelist_application extends DbData{
    public  function  getRecords_order_by ($value) {
        $sql = "select * from exhibits where USER_ID = ? order by EXHIBIT_TIME";
        $stmt = $this->query($sql, [$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }