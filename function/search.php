<?php
// 検索機能
function search(){
    
      $lastname = filter_input(INPUT_GET,'lastname',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $firstname = filter_input(INPUT_GET,'firstname',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      // 片方、両方が未入力、両方入力時の条件分岐
      $sql = "SELECT * FROM addressData where 1 ";
      $data=[];
      if(!empty($lastname)){
        $sql.=" and lastname=? ";
        $data[]=$lastname;
      }
      if(!empty($firstname)){
        $sql.=" and firstname=? ";
        $data[]=$firstname;
      }
      
      include "db_config.php";
      $PDO = new PDO($dsn, $user, $pass); //MySQLのデータベースに接続
      $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
      $stmt = $PDO->prepare($sql);
      $stmt->execute($data);
      $total_column = $stmt->columnCount(); 
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      // 見出し出力
    //   echo "<tr>";
    //   for ($counter = 0; $counter < $total_column; $counter ++) { 
    //     $meta = $stmt->getColumnMeta($counter); 
    //     echo "<th>". $meta['name']. "</th>";
    //   }
    //   echo "</tr>";
      // 中身出力
       foreach($result as $row) {
          echo "<tr>";
          echo '<td>'.'<input type="checkbox" name="id[]" value="'.$row['id'].'">'.'</td>';
          echo "<td>".$row['lastname']."&nbsp;".$row['firstname']."</td>";
          echo "<td>".$row['bd_y']."年".$row['bd_m']."月".$row['bd_d']."日"."</td>";
          echo "<td>".$row['zipcode']."</td>";
          echo "<td>".$row['pref'].$row['city'].$row['address']."</td>";
          echo "<td>".$row['tel']."</td>";
          echo "<td>".$row['mail']."</td>";
          echo "<td>".$row['id']."</td>";
          echo "<td>".'<a class = "updata" href=edit.php?id="'. $row['id'] . '">'.'更新画面へ'."</a>".'</td>';
        echo "</tr>\n";
       }
}
?>