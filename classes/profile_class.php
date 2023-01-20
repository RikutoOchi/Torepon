<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Profile extends DbData{
    public function transaction ($user) {
       $sql = "select * from users where USER_ID = ?";
       $stmt = $this->query($sql, [$user]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }

 class Transaction extends DbData{
  public function transaction_data ($user) {
     $sql = "select exhibits.EXHIBIT_ID,exhibits.EXHIBIT_PIC_URL
             from exhibits left outer join trades on exhibits.	EXHIBIT_ID = trades.TRADE_ID
             where exhibits.USER_ID = ?";
     $stmt = $this->query($sql, [$user]);
     $records = $stmt->fetchAll( );
     return  $records;
  }
 }