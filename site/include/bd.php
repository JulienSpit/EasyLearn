<?php
class Bd{

    private $pdo=null;

    public function __construct($database){
        $this->pdo = new PDO('sqlite:'.$database, null, null);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function query($sql, $params=array()){
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function query_unique($sql){
      return $this->pdo->query($sql, PDO::FETCH_OBJ);
    }
    public function last_insert_id(){
        return $this->pdo->lastInsertId();
    }
}
?>
