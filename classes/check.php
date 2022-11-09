<?php

  require_once __DIR__ . '/dbdata.php';

  // チケットの取得に関する履歴情報の取得
  class Check_get_chicket_data extends DbData{
     public function getRecord_check_get_chicket_data ($value) {
        $sql = "select trades.TRADE_FINISH_TIME,exhibits.NUMBER_OF_TICKETS,gacha_titles.GACHA_TITLE_NAME 
                from ((((( tickets left outer join ticket_types on tickets.TICKET_TYPE_ID = ticket_types.TICKET_TYPE_ID) 
                left outer join ticket_trades on tickets.TICKET_ID = ticket_trades.TICKET_ID)
                left outer join trades on ticket_trades.TRADE_ID = trades.TRADE_ID)
                left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID)
                left outer join gacha_titles on ticket_types.GACHA_TITLE_ID = gacha_titles.GACHA_TITLE_ID)
                where tickets.USER_ID = ?
                order by trades.TRADE_FINISH_TIME";
        $stmt = $this->query($sql, [$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }

  // チケットの消費に関する履歴情報の取得
  class Check_lost_chicket_data extends DbData{
    public function getRecord_check_lost_chicket_data ($value) {
       $sql = "select trades.TRADE_FINISH_TIME,exhibits.NUMBER_OF_TICKETS,gacha_titles.GACHA_TITLE_NAME 
               from ((((( tickets left outer join ticket_types on tickets.TICKET_TYPE_ID = ticket_types.TICKET_TYPE_ID) 
               left outer join ticket_trades on tickets.TICKET_ID = ticket_trades.TICKET_ID)
               left outer join trades on ticket_trades.TRADE_ID = trades.TRADE_ID)
               left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID)
               left outer join gacha_titles on ticket_types.GACHA_TITLE_ID = gacha_titles.GACHA_TITLE_ID)
               where trades.USER_ID = ?
               order by trades.TRADE_FINISH_TIME";
       $stmt = $this->query($sql, [$value]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }

?>