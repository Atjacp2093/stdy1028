<?php 

  session_start(); 

  require_once("functions.php"); 


  $name = $_SESSION['name']; 

  $email = $_SESSION['email']; 

  $gender = $_SESSION['gender']; 


$dbh = db_conn();      // データベース接続 

try{ 

      $sql = "INSERT INTO user (email, name, gender) VALUE (:email, :name, :gender)"; 

      $stmt = $dbh->prepare($sql);                           //クエリの実行準備 

      $stmt->bindValue(':email', $email, PDO::PARAM_STR);      //バインド:プレースホルダ―を埋める 

      $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //バインド:プレースホルダ―を埋める 

      $stmt->bindValue(':gender', $gender, PDO::PARAM_INT); //バインド:プレースホルダーを埋める 

      $stmt->execute();                                        //クエリの実行 

      $dbh = null;                                             //MySQL接続解除 

}catch (PDOException $e){ 

      echo($e->getMessage()); 

    die(); 

} 

?> 


<!DOCTYPE html> 

（以下省略） 