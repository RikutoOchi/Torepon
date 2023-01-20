<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class News extends DbData{
    public function news_get_massege ($user) {
       $sql = "select users.USER_NAME,chats.CHAT_TIME from chats left outer join users on chats.USER_ID = users.USER_ID where chats.PARTNER_USER_ID = ? and chats.FLAG = 0 order by chats.CHAT_TIME DESC";
       $stmt = $this->query($sql, [$user]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }