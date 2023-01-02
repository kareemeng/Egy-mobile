<?php
 class database{
    private $connecte;
    public function __construct(){
        try{
            $this->connecte=new PDO("mysql:host=localhost;dbname=projct_1","root","");
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
    
    public function run($stm){
        return $this->connecte->query($stm);
    }

    public function select($table,$condition=1,$select="*"){
        $stm="SELECT $select FROM $table WHERE $condition";
        return $this->run($stm);
    }

    public function delete($table,$condition=1){
        $stm="DELETE FROM $table WHERE $condition";
        return $this->run($stm);
    }

    public function update($table, $select,$val, $condition = 1)
    {
        $stm="UPDATE From $table SET $select=$val WHERE $condition";
        return $this->run($stm);
    }
}

?>