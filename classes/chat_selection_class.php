<?php

  require_once __DIR__ . '/dbdata.php';

  // チャット相手のユーザー情報の取得
  class Chat_selection_trade_id extends DbData{
    public function get_trade_select ($user_id) {
      $sql = "select distinct TRADE_ID
              from chats
              where USER_ID = ?
              or PARTNER_USER_ID = ?";
      $stmt = $this->query($sql, [$user_id,$user_id]);
      $records = $stmt->fetchAll( );
      return  $records;
    }
  }

  // チャット相手のユーザー情報の取得
  class Chat_selection_product_info extends DbData{
    public function get_product_info ($trade_id) {
      $sql = "select exhibits.USER_ID AS 'sell_id', trades.USER_ID AS 'buy_id',exhibits.EXHIBIT_PIC_URL,exhibits.EXHIBIT_NAME
              from trades left outer join exhibits
              on trades.TRADE_ID = exhibits.EXHIBIT_ID
              where trades.TRADE_ID = ?
              limit 1";
      $stmt = $this->query($sql, [$trade_id]);
      $records = $stmt->fetchAll( );
      return  $records;
    }
  }