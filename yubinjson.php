<?php
include "function/db_config.php";
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// 接続状況をチェックします
if (mysqli_connect_errno()) {
    exit();
}
$postnum=$_GET["post"]; // ブラウザの引数を取得
$query = "SELECT pref,city,address from KEN_ALL where postal7 = '".$postnum."';";
// クエリを実行します。
if ($result = mysqli_query($link, $query)) {
    if ($result) {
      foreach ($result as $row) {
        $data = array("pref"=>$row['pref'], "city"=>$row['city'], "address"=>$row['address']);
        echo json_encode($data);
        break; // 先頭の1件だけ返す
      }
    }
}
// 接続を閉じます
mysqli_close($link);
?>
