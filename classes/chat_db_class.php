<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Chat_db_insert extends DbData{
    // 出品を登録する
    public function insert($trade_id,$user_id,$partner_user_id,$chat_time,$chat_text){
        $sql = "insert into chats(TRADE_ID,USER_ID,PARTNER_USER_ID,CHAT_TIME,CHAT_TEXT) values(?,?,?,?,?)";
        $result = $this->exec($sql, [$trade_id,$user_id,$partner_user_id,$chat_time,$chat_text]);
    }
  }

  class Chat_db_trade_id extends DbData{
    public function get_trade_id ($usser_id,$id) {
       $sql = "select TRADE_ID from CHATS where USER_ID = ? and PARTNER_USER_ID = ?";
       $stmt = $this->query($sql, [$usser_id,$id]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }

 