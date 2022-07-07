<?php
    // スーパークラスであるDbDataを利用するため
    require_once __DIR__ . '/dbdata.php';

    // Userクラスの宣言
    class  User  extends  DbData {
       // // 選択されたジャンルの商品を取り出す
       // public  function  getItems ( $genre ) {
       //     $sql  =  "select  *  from  items  where  genre  =  ?";
       //     $stmt = $this->query( $sql,  [$genre] );
       //     $items = $stmt->fetchAll( );
       //     return  $items;
        //}

        // 選択された商品を取り出す
        public function getUser($user_id){
            $sql = "select * from users where USER_ID = ?";
            $stmt = $this->query($sql, [$user_id]);
            $user = $stmt->fetch();
            return $user;
        }
    }
