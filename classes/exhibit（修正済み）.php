<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Exhibit extends DbData{
    // 出品を登録する
    public function ex_add($user_id,$exhibit_name, $exhibit_text, $img_url, $gacha_title_id, $ticket_type_id,$number_of_tickets){
        $sql = "insert into exhibits values(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->exec($sql, [NULL,$user_id, $exhibit_name, $exhibit_text
        , $img_url, $gacha_title_id, NULL,$ticket_type_id,$number_of_tickets]);
    }
  }