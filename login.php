<?php
   // 連線資料庫：主機、帳號、密碼、資料庫名稱
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
   // 查詢 user 資料表中的所有使用者資料
   $result=mysqli_query($conn, "select * from user");
   // 預設登入狀態為 FALSE，表示尚未登入成功
   $login=FALSE;
   // 逐筆比對資料庫中的帳號密碼
   while ($row=mysqli_fetch_array($result)) {
    // 如果輸入的帳號和密碼都與資料庫相同，就代表登入成功
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       $login=TRUE;
     }
   } 
   // 如果登入成功
   if ($login==TRUE) {
    // 啟動 Session，準備記錄登入狀態
    session_start();
    // 將登入帳號存入 Session，之後其他頁面可以用它判斷是否已登入
    $_SESSION["id"]=$_POST["id"];
    echo "登入成功";
    // 2 秒後自動跳到佈告欄列表頁
    echo "<meta http-equiv=REFRESH content='2, url=bulletin.php'>";
   }

  else{
    // 帳號或密碼比對失敗
    echo "帳號/密碼 錯誤";
    // 2 秒後自動回到登入頁
    echo "<meta http-equiv=REFRESH content='2, url=login.html'>";
  }
?>