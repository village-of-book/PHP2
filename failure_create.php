<?php
// POSTデータ確認

// var_dump($_POST);
// exit();

// if (
//     !isset($_POST['title']) || $_POST['title'] === '' ||
//     !isset($_POST['text_failure']) || $_POST['text_failure'] === ''
//     !isset($_POST['text_success']) || $_POST['text_success'] === ''
//     ) {
//     exit('データがありません');
//   }

//   exit('ok');

// // todo_create.php
$title = $_POST['title'];
$text_failure = $_POST['text_failure'];
$text_success = $_POST['text_success'];


// // 各種項目設定
$dbn ='mysql:dbname=step_to_your_success;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// // DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
  }

// SQL作成&実行
$sql = 'INSERT INTO memo(id, title, text_failure, text_success, created_at, updated_at) VALUES (NULL, :title, :text_failure, :text_success, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':text_failure', $text_failure, PDO::PARAM_STR);
$stmt->bindValue(':text_success', $text_success, PDO::PARAM_STR);

// // SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
header('Location:failure_input.php');
exit();