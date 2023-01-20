<?php
  // スーパークラスであるDbDataを利用するため
  require_once __DIR__ . '/dbdata.php';

  class Trade extends DbData{
    // トレードを登録する
    public function tr_add($exhibit_id,$user_id,$time){
        $sql = "insert into trades values(?,?,?,?,?,?)";
        $result = $this->exec($sql, [$exhibit_id,$user_id, 
          $time, $time, 1, NULL]);
    }
  }

  class Trade_user_info extends DbData{
    // トレードIDを取得
    public function get_user_info($trade_id,$user_id,$s_time){
        $sql = "select exhibits.USER_ID
                from trades left outer join exhibits 
                on exhibits.EXHIBIT_ID = trades.TRADE_ID
                where trades.TRADE_ID = ?
                and trades.USER_ID = ? 
                and trades.TRADE_START_TIME = ?";
        $stmt = $this->query($sql, [$trade_id,$user_id,$s_time]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }

  class Trade_chat_text extends DbData{
    // 申請時のメッセージを格納
    public function chat_text_add($trade_id,$user_id,$partner_user_id,$chat_time,$chat_text,$flag){
        $sql = "insert into chats(TRADE_ID,USER_ID,PARTNER_USER_ID,CHAT_TIME,CHAT_TEXT,FLAG) value(?,?,?,?,?,?)";
        $result = $this->exec($sql, [$trade_id,$user_id,$partner_user_id,$chat_time,$chat_text,$flag]);
    }
  }

  // 相手の名前取得
  class Trade_name extends DbData{
    public function get_name($id){
        $sql = "select USER_NAME from users where USER_ID = ?";
        $stmt = $this->query($sql, [$id]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }


/* ---------------------------------- 申請時のメッセージを相手方に通知するための処理 --------------------------------------- */

  /* 概要
      ADDRESS_ID　　→　メッセージの送信先のユーザーID
      SENDER_ID　　 →　メッセージを送信した人のユーザーID
      CONTENT　　　 →　メッセージ内容
  */
  class Trade_notification extends DbData{
    public function notification_add($address_id,$sender_id,$content,$time){
        $sql = "insert into notification(ADDRESS_ID,SENDER_ID,CONTENT,TIME) value(?,?,?,?)";
        $result = $this->exec($sql, [$address_id,$sender_id,$content,$time]);
    }
  }

/* ---------------------------------- /申請時のメッセージを相手方に通知するための処理 -------------------------------------- */

