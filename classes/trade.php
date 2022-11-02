<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Trade extends DbData{
    // トレードを登録する
    public function tr_add($exhibit_id,$user_id){
        $sql = "insert into trades values(?,?,?,?,?,?,?)";
        $result = $this->exec($sql, [NULL,$exhibit_id,$user_id, 
          date("Y/m/d H:i:s"), date("Y/m/d H:i:s"), 0,NULL]);
    }
  }