<?php
    // スーパークラスであるDbDataを利用するため
    require_once __DIR__ . '/dbdata.php';

    // Productクラスの宣言
    class Search extends DbData {
        // 検索結果
        public function getItems ( $Searchdata, $select ) {
            $sql  =  "";
            $stmt = $this->query( $sql, [$Searchdata,$select] );
            $datas = $stmt->fetchAll( );
            return  $datas;
        }
    }