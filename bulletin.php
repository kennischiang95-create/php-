<?php
    // 顯示所有錯誤訊息，方便除錯
    error_reporting(0);
    // 啟動 Session，才能讀取 $_SESSION["id"] 判斷是否已登入
    session_start();
    // 如果 Session 裡沒有 id，代表使用者尚未登入
    if (!$_SESSION["id"]) {
        echo "請先登入";
	// 3 秒後自動跳回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
    }
    else{
    // 顯示登入者名稱，以及功能連結
        echo "歡迎, ".$_SESSION["id"]."[<a href=logout.php>登出</a>] [<a href=user.php>管理使用者</a>] [<a href=bulletin_add_form.php>新增佈告</a>]<br>";
	// 連線資料庫：主機、帳號、密碼、資料庫名稱
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
	// 查詢 bulletin 資料表中的所有佈告資料
        $result=mysqli_query($conn, "select * from bulletin");
        // 建立表格標題列
	echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
	// 逐筆讀取查詢結果，並顯示在表格中
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td><a href=bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
	// 結束表格
        echo "</table>";    
    }
?>