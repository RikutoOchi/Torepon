<?php                     
  class  DbData {              // DbDataクラスの宣言     
                      
      protected  $pdo;         // PDOオブジェクト用のプロパティ（メンバ変数）の宣言     
                      
      public function __construct( ) {   // コンストラクタ     
          // PDOオブジェクトを生成する                     
          $dsn = 'mysql:host=localhost;dbname=torepon;charset=utf8';                     
          $user = 'root';                     
          $password = '';                     
          try{                      
              $this->pdo = new PDO($dsn, $user, $password);                     
          } catch(Exception  $e){                     
              echo 'Error:' . $e->getMessage( );              
              die( );                     
          }                     
      }                     
                      
      protected function query ( $sql,  $array_params ) {  // SELECT文実行用のメソッド
          $stmt = $this->pdo->prepare( $sql );                      
          $stmt->execute( $array_params );                      
          return  $stmt;          // PDOステートメントオブジェクトを返すのでfetch( )、fetchAll( )で結果セットを取得           
      } 
      public function getRecord($table,$column,$id){
        $sql = "select * from $table where $column = ?";
        $stmt = $this->query($sql, [$id]);
        $record = $stmt->fetch();
        return $record;
    }
      public  function  getRecords ($table,$column,$value) {
        $sql = "select * from $table where $column = ?";
        $stmt = $this->query($sql, [$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
                          
                      
      protected function exec ( $sql,  $array_params ) {  // INSERT、UPDATE、DELETE文実行用のメソッド
          $stmt = $this->pdo->prepare( $sql );                      
          return  $stmt->execute( $array_params );        // 成功：true、失敗：false
      }                     
  }                     
