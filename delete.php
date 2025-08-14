<?php
    session_start();
    require_once(__DIR__ . '/join/functions.php');
    
    // ログインしているかを確認
    if(isset($_SESSION['name']) && isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $name = $_SESSION['name'];
    }else{
        header("location: login.php");
        exit();
    }

    $post_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if(!$post_id) {
        header('location: index.php');
        exit();
    }
    $db = dbconnect();
    $stmt = $db->prepare('delete from posts where id=? and member_id=? limit 1');
    if(!$stmt) {
        die($db->error);
    }        
    $stmt->bind_param('ii', $post_id, $id);
    $success = $stmt->execute();
    if(!$success) {
        die($db->error);
    }

header('Location: index.php'); exit();
?>
