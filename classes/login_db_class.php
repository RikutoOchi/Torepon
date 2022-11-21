<?php
  require_once __DIR__ . '/dbdata.php';

  // ログインユーザーの登録情報取得
  class login extends DbData{
     public function login_check ($mail,$password) {
        $sql = "select *from USERS
                where MAIL_ADDRESS = ? and USER_PASSWORD = ?";
        $stmt = $this->query($sql, [$mail,$password]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }