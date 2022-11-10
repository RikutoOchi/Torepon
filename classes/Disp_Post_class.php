<?php

    // スーパークラスであるDbDataを利用するため
    require_once __DIR__ . '/dbdata.php';

    // ガチャタイトルを取得
    class Disp_Post_class extends DbData{
        public function get_records_gacha_title () {
        $sql = "select distinct GACHA_TITLE_ID,GACHA_TITLE_NAME from gacha_titles";
            $stmt = $this->query($sql, []);
            $records = $stmt->fetchAll( );
            return  $records;
        }
    }

?>