<?php
  require_once __DIR__ . '/dbdata.php';

  class Tradelist_exhibit extends DbData{
     public function getRecord_tradelist_number_of_transactions ($table1,$table2,$colum1,$colum2,$colum3,$colum4,$value) {
        $sql = "select * from $table1 left outer join $table2 on $table1.$colum1 = $table2.$colum2
                where $table2.$colum3 = ? order by $colum4";
        $stmt = $this->query($sql, [$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }

  class Tradelist_exhibition_information extends DbData{
    public function getRecord_exhibition_information ($table1,$table2,$colum1,$colum2,$colum3,$colum4,$value) {
       $sql = "select * from $table1 left outer join $table2 on $table1.$colum1 = $table2.$colum2
               where $table1.$colum1 = ? order by $colum3,$colum4";
       $stmt = $this->query($sql, [$value]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }


  class Tradelist_application extends DbData{
    public  function  getRecords_order_by ($table,$colum,$colum2,$value) {
        $sql = "select * from $table where $colum = ? order by $colum2";
        $stmt = $this->query($sql, [$value]);
        $records = $stmt->fetchAll( );
        return  $records;
    }
  }