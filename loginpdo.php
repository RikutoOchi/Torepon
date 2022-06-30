<?php
	// PDOオブジェクトの生成
	$dsn = 'mysql:host=localhost;dbname=torepon;charset=utf8';
	$user = 'login';
	$password = 'contact';
	$pdo = new PDO($dsn, $user, $password);

	// 画面表示データのエスケープ処理用関数
	function h ( $data ) {
		return htmlspecialchars($data, ENT_QUOTES, "UTF-8");
	}
# ユーザー「login」にパスワード「contact」を設定し、データベース「torepon」に対する全ての権限を付与
# grant all privileges on torepon.* to login@localhost identified by 'contact';