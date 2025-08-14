<?php

    // htmlspecialchars
    function h($value) {
        return htmlspecialchars($value, ENT_QUOTES);
    }

    // DB接続
    function dbconnect() {
        $db = new mysqli('localhost', 'root', 'root', 'min_bbs', 8889);
        if($db->connect_error) {
			die('DB接続エラー:' . $db->connect_error);
		}
        return $db;
    }