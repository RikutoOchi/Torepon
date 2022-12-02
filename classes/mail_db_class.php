<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Mail_procedure extends DbData{
    // 出品を登録する
    public function mail_procedure_add($full_name,$phone_number,$post_code,$prefectures,$municipalities,$town_name_address,$building_name,$user_id){
        $sql = "update users set FULL_NAME = ?, PHONE_NUMBER = ?, POST_CODE = ?, PREFECTURES = ?, MUNICIPALITIES = ?, TOWN_NAME_ADDRESS = ?, BUILDING_NAME = ? where user_id = ?";
        $result = $this->exec($sql, [$full_name,$phone_number,$post_code,$prefectures,$municipalities,$town_name_address,$building_name,$user_id]);
    }
  }