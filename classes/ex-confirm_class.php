<?php
    // トレード相手のユーザーIDを取得（最大１名分）
    class Ex_confirm extends DbData{
        public function get_partner_user_id($user_id,$exhibit_id){
            $sql = "select trades.USER_ID AS 'sell_id',exhibits.USER_ID AS 'buy_id'
                    from trades left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID
                    where exhibits.USER_ID = ? and exhibits.EXHIBIT_ID = ?
                    or trades.USER_ID = ? and exhibits.EXHIBIT_ID = ?
                    order by trades.TRADE_START_TIME
                    LIMIT 1";
            $stmt = $this->query($sql, [$user_id,$exhibit_id,$user_id,$exhibit_id]);
            $records = $stmt->fetchAll( );
            return  $records;
        }
    }