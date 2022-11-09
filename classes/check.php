<?php

  require_once __DIR__ . '/dbdata.php';

  // チケットの使用・入手履歴取得
  class Check_chicket_data extends DbData{
     public function getRecord_check_chicket_data ($value) {
        $sql = "select trades.TRADE_FINISH_TIME,exhibits.NUMBER_OF_TICKETS,gacha_titles.GACHA_TITLE_NAME,tickets.USER_ID
                from ((((( tickets left outer join ticket_types on tickets.TICKET_TYPE_ID = ticket_types.TICKET_TYPE_ID) 
                left outer join ticket_trades on tickets.TICKET_ID = ticket_trades.TICKET_ID)
                left outer join trades on ticket_trades.TRADE_ID = trades.TRADE_ID)
                left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID)
                left outer join gacha_titles on ticket_types.GACHA_TITLE_ID = gacha_titles.GACHA_TITLE_ID)
                where tickets.USER_ID = ? or trades.USER_ID = ?
                order by trades.TRADE_FINISH_TIME";
        $stmt = $this->query($sql, [$value,$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }

  // 自分が持っているチケットの種類一覧を取得
  class Check_keep_chicket_type_data extends DbData{
    public function getRecord_check_keep_chicket_type_data ($value) {
       $sql = "select gacha_titles.GACHA_TITLE_ID
               from ((((( tickets left outer join ticket_types on tickets.TICKET_TYPE_ID = ticket_types.TICKET_TYPE_ID) 
               left outer join ticket_trades on tickets.TICKET_ID = ticket_trades.TICKET_ID)
               left outer join trades on ticket_trades.TRADE_ID = trades.TRADE_ID)
               left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID)
               left outer join gacha_titles on ticket_types.GACHA_TITLE_ID = gacha_titles.GACHA_TITLE_ID)
               where tickets.USER_ID = ?";
       $stmt = $this->query($sql, [$value]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }

 class Check_keep_chicket_data extends DbData{
        public function getRecord_check_keep_chicket_data ($user_id,$value) {
           $sql = "select gacha_titles.GACHA_TITLE_NAME,sum(exhibits.NUMBER_OF_TICKETS) as NUMBER_OF_TICKETS
                   from ((((( tickets left outer join ticket_types on tickets.TICKET_TYPE_ID = ticket_types.TICKET_TYPE_ID) 
                   left outer join ticket_trades on tickets.TICKET_ID = ticket_trades.TICKET_ID)
                   left outer join trades on ticket_trades.TRADE_ID = trades.TRADE_ID)
                   left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID)
                   left outer join gacha_titles on ticket_types.GACHA_TITLE_ID = gacha_titles.GACHA_TITLE_ID)
                   where tickets.USER_ID = ? and gacha_titles.GACHA_TITLE_ID = ?";
           $stmt = $this->query($sql, [$user_id,$value]);
           $records = $stmt->fetchAll( );
           return  $records;
       }
     }

?>