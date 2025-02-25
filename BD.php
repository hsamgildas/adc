<?php
function insertdata($tableName,$columns,$values){
    try{
        require "db.php";
        $placeholder=implode(",",array_fill(0,count($values),"?"));
        $sql="INSERT INTO $tableName ($columns) VALUES ($placeholder)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute($values);
    }
    catch(PDOException $e){
        echo "erreur lors de l'insertion dans la base de donnees : ".$e->getMessage();
    }
}
function get($entintyName){
    require("db.php");
    $stmt=$pdo->prepare("SELECT * FROM $entintyName");
    $stmt->execute();
    $all=$stmt->fetchAll();
    return $all;
}
function update($table,$params,$id,$idName){
    require("db.php");
    $setClause='';
    $values=[];
    foreach($params as $key=>$value){
        $setClause.="$key=?,";
        $values[]=$value;
    }
    $trimClause=trim($setClause,",");
    $sql="UPDATE $table SET $trimClause WHERE $idName=$id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute($values);
}
function delete($table,$id,$idName){
    require("db.php");
    $sql="DELETE FROM $table WHERE $idName=$id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
}
function getEntityById($table,$id,$idName){
    require("db.php");
    $sql="SELECT * FROM $table WHERE $idName=$id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $client=$stmt->fetchAll();
    return $client;  
}
?>