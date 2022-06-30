<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ようこそ</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
<div id="main">
<?php

	// データベース接続に必要なPHPファイルを読み込む
	require_once __DIR__ . 'loginpdo.php';

	// 受信データを変数に格納
	$ident = $_POST['email'];
	$pass = $_POST['password'];
	
	
	// 発生したエラー、例外を特定するコード番号を代入する
	$error_code = 0;
	
	// 受信データの値の有効性チェック
	if ( empty( $ident ) || empty( $pass ) ) {
		// 受信データが有効でない場合のエラーコード（その他のチェックは今回省略）
		$error_code = 100;
	} else {
		try {
			// 入力されたユーザーIDをキーに、データベースからデータを抽出
			$sql = "select * from password where ident = ? and pass = ?";
			$stmt = $pdo->prepare( $sql );
			$stmt->execute( [ $ident, $pass ] );
			$result = $stmt->fetch( );
			if( empty( $result[ 'ident' ] ) ) {
				// empty()の戻り値がTRUE → データがない → ユーザーIDとパスワードが正しくない
				$error_code = 200;
			} else {
				// 入力されたユーザーIDとパスワードがデータベースと一致
				$name = $result[ 'name' ];
			}
		} catch ( Exception $e ) {
			// データベース関連の例外発生
			$error_code = 900;
			// die();           // エラーメッセージを表示するためここではdie()しない
		}
		$pdo = null;
	}
	// error_codeの値に応じたメッセージを表示する
	if ( $error_code == 0 ) {
		echo "<h2>ようこそ!</h2>";
		echo "<hr><br>";
		//echo "こんにちは、" . h ( $name ) . "さん!<br><br>";
		echo "<a href='login.html'>ログインページへ</a>";
	} else if ( $error_code == 100 ) {
		echo "<h2>未入力項目があります。</h2>";
		echo "<hr><br>";
		echo "ユーザーID、パスワードを入力してください。<br><br>";
		echo "<a href='login.html'>ログインページへ</a>";
	} else if ( $error_code == 200 ) {
		echo "<h2>ユーザーID、パスワードが違います。</h2>";
		echo "<hr><br>";
		echo "ユーザーID、パスワードを確認してください。<br>";
		echo "<a href='login.html'>ログインページへ</a>";
	} else if ( $error_code == 900 ) {
		echo "<h2>データベースエラー</h2>";
		echo "<hr><br>";
		echo "データベースでエラーが発生しました。<br>";
		echo "管理者に連絡してください。<br><br>";
		echo "<a href='login.html'>ログインページへ</a>";
	}
?>
<br><br>
<hr>
</div>
</body>
</html>
