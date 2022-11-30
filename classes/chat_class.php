<?php

    require_once __DIR__ . '/dbdata.php';

    // ガチャタイトルを取得
    class Chat_trade_id extends DbData{
        public function get_trade_id ($user_id,$id) {
        $sql = "select TRADE_ID from CHATS where USER_ID = ? and PARTNER_USER_ID = ?";
            $stmt = $this->query($sql, [$user_id,$id]);
            $records = $stmt->fetchAll( );
            return  $records;
        }
    }

    // チャット相手のユーザー情報の取得
    class Chat_user_info extends DbData{
        public function get_chat_user_info ($user_id) {
        $sql = "select DISTINCT CHATS.PARTNER_USER_ID,USERS.USER_NAME,USERS.USER_ICON_URL 
                from CHATS LEFT OUTER JOIN USERS ON CHATS.PARTNER_USER_ID = USERS.USER_ID
                where CHATS.USER_ID = ?";
            $stmt = $this->query($sql, [$user_id]);
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