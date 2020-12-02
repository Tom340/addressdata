<?php
// 削除機能
function delete(){
    
    $sql = "DELETE FROM addressData WHERE id = :id";
    
    include "db_config.php";
    
    $PDO = new PDO($dsn, $user, $pass); //MySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
    $stmt = $PDO->prepare($sql);
    $data = $_POST['id'];
    foreach ($data as $value) {
       // 配列の値を :id にセットし、executeでSQLを実行
        $stmt->execute(array(':id' => $value));
    }
    
}
?>