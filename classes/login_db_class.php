<?php
  require_once __DIR__ . '/dbdata.php';

  // 入力されたメールアドレス＆パスワードが一致しているユーザーIDの取得
  class login extends DbData{
     public function login_check ($mail,$password) {
        $sql = "select USER_ID
                from USERS
                where MAIL_ADDRESS = ? and USER_PASSWORD = ?";
        $stmt = $this->query($sql, [$mail,$password]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }

  // ログインユーザーの登録情報取得
  class login_user_info extends DbData{
    public function login_user_info($mail,$password) {
        $sql = "select USER_ID,MAIL_ADDRESS,USER_NAME,USER_ICON_URL,USER_TEXT
                from USERS
                where MAIL_ADDRESS = ? and USER_PASSWORD = ?";
        $stmt = $this->query($sql, [$mail,$password]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }