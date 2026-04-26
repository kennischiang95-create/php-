<html>
    <head><title>使用者管理</title></head>
    <body>
        <?php
        // 顯示所有錯誤訊息，方便除錯；
        error_reporting(0);
        // 啟動 Session，才能讀取 $_SESSION["id"] 判斷是否已登入
        session_start();
        // 如果 Session 裡沒有 id，代表使用者尚未登入
        if (!$_SESSION["id"]){
            echo "請登入帳號";
            // 2 秒後自動跳回登入頁面
            echo "<meta http-equiv=REFRESH content='2, url=login.html'>";
        }
        else{
            // 顯示使用者管理頁標題、功能連結與表格標題
            echo "<h1>使用者管理</h1>
            [<a href=user.add.form.php>新增使用者</a>] [<a href=bulletin.php>回布告欄列表</a>]<br>
            <table border=1>
            <tr><td>功能</td><td>帳號</td><td>密碼</td></tr>";

            // 連線資料庫：主機、帳號、密碼、資料庫名稱
            $conn=mysqli_connect("120.105.96.90" , "immust" , "immustimmust" , "immust");
            // 查詢 user 資料表中的所有使用者資料
            $result=mysqli_query($conn, "select * from user");
            // 逐筆讀取查詢結果，並顯示在表格中
            while ($row=mysqli_fetch_array($result)){
                echo "<tr><td><a href=user_edit_form.php?id={$row['id']}>修改</a> || <a href=user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            // 結束表格
            echo "</table>";
        }
    ?>
    </body>
</html>