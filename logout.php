<?php
    // 啟動 Session，才能清除登入資料
    session_start();
    // 清除 Session 裡記錄的使用者帳號
    unset($_SESSION["id"]);
    // 顯示登出成功訊息
    echo "登出成功,正在回到登入畫面";
    // 2 秒後自動跳回登入頁面
    echo "<meta http-equiv=REFRESH content='2; url=login.html'>";
?>