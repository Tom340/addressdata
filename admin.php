

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>アドレス管理画面</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function itemCheck() {
      var flag = false; // 選択されているか否かを判定する変数
      const elements = document.getElementsByName("id[]");
     
      for (var i = 0; i < elements.length; i++) {
        // i番目のチェックボックスがチェックされているかを判定
         if (elements[i].checked) {
           flag = true;
           }
          }
         if(flag){
           ret = confirm("選択した項目を削除しますか？");
           if (ret == true){
             return true;
           }
         }
       // 何も選択されていない場合の処理   
         if (!flag) {
         alert("項目を選択して下さい。");
         return false;
         }
    }
    </script>
</head>
<body>
  <?php 
 
 session_start();
 
  if(!isset($_SESSION['id'])){
    
    $url = "login.php";
    header("Location: {$url}");
    exit;
  }
?>
 
  <h1>アドレス帳管理画面</h1>
  <div class = "link">
    <p class = "regist"><a href="./regist.php">アドレス帳登録</a></p>
    <p class = "admin"><a href="./admin.php">検索・管理画面</a></p>
    <p class="signup"><a href="signup.php">アカウント追加登録</a></p>
    <p class = "logout"><a href="./logout.php">ログアウト</a></p>
  </div>
  <header>
    <h2>アドレス帳</h2>
  </header>
  <form action="./admin.php" method="get">
    <input type="text" name="lastname" placeholder="姓">
    <input type="text" name="firstname" placeholder="名">
    <input type="submit" name="search" value="検索" class="btn">
  </form>
  <form action="./admin.php" method="post" name="registform" onsubmit="return itemCheck();">
  <table class = "width-max">
    <tr>
      <th>チェック</th>
      <th>名前</th>
      <th>生年月日</th>
      <th>郵便番号</th>
      <th>住所</th>
      <th>連絡先</th>
      <th>メールアドレス</th>
      <th>ID</th>
      <th>編集</th>
    </tr>
<?php
  $message ="";
  // 検索機能
   if(isset($_GET['search'])){
    try{
      require("function/search.php");
      
      search();
       $PDO = null;
    }catch (PDOException $e){
	   print('Error:'.$e->getMessage());
	   die();
    }
   }
  // 検索機能終了
  // 削除機能
  // DELETE FROM テーブル名 WHERE 条件;
  if(isset($_POST['delete'])){
      try{
          require("function/delete.php");
          delete();
          
          // 削除後データ表示（不要かも）
          require("function/search.php");
          search();
          $PDO = null;
          $message = "削除しました";
      }catch (PDOException $e){
  	   //print('Error:'.$e->getMessage());
  	   die();
      }
    }
  
?>
    </table>
      <input type="submit" name="delete" value="削除" class="btn">
  　</form>
  　<p><?php if(isset($message)){echo $message;}?></p>
</body>
</html>