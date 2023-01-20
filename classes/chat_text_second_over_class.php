<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Chat_text_second_over_chat_detail extends DbData{
    public function get_chat_detail ($id,$user_id) {
       $sql = "select CHAT_TEXT,USER_ID,PARTNER_USER_ID 
               from CHATS
               where USER_ID = ? and PARTNER_USER_ID = ? and FLAG = 0
               or USER_ID = ? and PARTNER_USER_ID =? and FLAG = 0 ORDER BY CHAT_TIME";
       $stmt = $this->query($sql, [$id,$user_id,$user_id,$id]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }

 class Chat_text_second_over_user_icon extends DbData{
    public function get_user_icon ($id) {
       $sql = "select USER_ID,USER_ICON_URL from USERS where USER_ID = ?";
       $stmt = $this->query($sql, [$id]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }
