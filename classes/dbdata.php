<?php                     
  class  DbData {              // DbDataクラスの宣言     
                      
      protected  $pdo;         // PDOオブジェクト用のプロパティ（メンバ変数）の宣言     
                      
      public function __construct( ) {   // コンストラクタ     
          // PDOオブジェクトを生成する                     
          $dsn = 'mysql:host=localhost;dbname=torepon;charset=utf8';                     
          $user = 'shopping';                     
          $password = 'site';                     
          try{                      
              $this->pdo = new PDO($dsn, $user, $password);                     
          } catch(Exception  $e){                     
              echo 'Error:' . $e->getMessage( );              
              die( );                     
          }                     
      }                     
                      
      protected function query ( $sql,  $array_params ) {  
          $stmt = $this->pdo->prepare( $sql );                      
          $stmt->execute( $array_params );                      
          return  $stmt;          
      } 
      public function getRecord($table,$column,$id){
        $sql = "select * from $table where $column = ?";
        $stmt = $this->query($sql, [$id]);
        $record = $stmt->fetch();
        return $record;
    }
      public function updateField($table,$column,$id,$column_update,$update_value){
        $sql = "update $table set $column_update = $update_value where $column = ?";
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
       public function getRecord_0($sql){
        $stmt = $this->query($sql, []);
        $record = $stmt->fetchAll();
        return $record;
    }
                          
                      
      protected function exec ( $sql,  $array_params ) {  
          $stmt = $this->pdo->prepare( $sql );                      
          return  $stmt->execute( $array_params ); 
      }                     
  }                     
