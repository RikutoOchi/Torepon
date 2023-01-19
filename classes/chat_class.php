<?php

    require_once __DIR__ . '/dbdata.php';

    // チャット相手のユーザー情報の取得
    class Chat_user_info extends DbData{
        public function get_chat_user_info ($user_id,$trade_id) {
        $sql = "select distinct chats.PARTNER_USER_ID,users.USER_NAME,users.USER_ICON_URL 
                from chats left outer join users on chats.PARTNER_USER_ID = users.USER_ID
                where chats.USER_ID = ?
                and chats.TRADE_ID = ?";
            $stmt = $this->query($sql, [$user_id,$trade_id]);
            $records = $stmt->fetchAll( );
            return  $records;
        }
    }

    // 最新のチャット内容の取得
    class Chat_detail extends DbData{
        public function get_chat_detail ($user_id,$partner_user_id) {
        $sql = "select CHAT_TEXT
                from CHATS
                where USER_ID = ? and PARTNER_USER_ID = ? 
                or USER_ID = ? and PARTNER_USER_ID = ?
                ORDER BY CHAT_TIME DESC LIMIT 1";
            $stmt = $this->query($sql, [$user_id,$partner_user_id,$partner_user_id,$user_id]);
            $records = $stmt->fetchAll( );
            return  $records;
        }
    }

    // チャット内容の取得
    class Chat_text extends DbData{
        public function get_chat_text ($id,$user_id) {
        $sql = "select CHAT_TEXT,USER_ID,PARTNER_USER_ID 
                from CHATS
                where USER_ID = ? and PARTNER_USER_ID = ? and FLAG = 0
                or USER_ID = ? and PARTNER_USER_ID = ? and FLAG = 0
                ORDER BY CHAT_TIME";
            $stmt = $this->query($sql, [$id,$user_id,$user_id,$id]);
            $records = $stmt->fetchAll( );
            return  $records;
        }
    }

    // チャット内容の取得
    class Chat_partner_user_icon extends DbData{
        public function get_partner_user_icon ($id) {
        $sql = "select USER_ID,USER_ICON_URL 
                from USERS
                where USER_ID = ?";
            $stmt = $this->query($sql, [$id]);
            $records = $stmt->fetchAll( );
            return  $records;
        }
    }

    // 表示内容の切り替えに使用
    class Chat_switching extends DbData{
        public function get_switching_data ($user_id,$trade_id,$id) {
        $sql = "select trades.USER_ID,trades.TRADE_PROGRESS  
                from trades left outer join exhibits
                on trades.TRADE_ID = exhibits.EXHIBIT_ID 
                where trades.TRADE_ID = ?
                and exhibits.USER_ID = ?
                and trades.USER_ID = ?
                or exhibits.USER_ID = ?
                and trades.USER_ID = ?";
            $stmt = $this->query($sql, [$trade_id,$user_id,$id,$id,$user_id]);
            $records = $stmt->fetchAll( );
            return  $records;
        }
    }
