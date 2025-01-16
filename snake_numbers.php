<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>LとRを入力</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/ress@5.0.2/dist/ress.min.css"> -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>ヘビ数の計算</h1>
    <p>10以上の整数LとRを入力してください。</p>
    <form method="post">
        <label for="L">Lを入力してください:</label>
        <input type="number" id="L" name="L" required>
        <br>
        <label for="R">Rを入力してください:</label>
        <input type="number" id="R" name="R" required>
        <br>
        <button type="submit">送信</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $L = intval($_POST['L']);
        $R = intval($_POST['R']);

        // 入力が正しい場合の確認用（デバッグ用）
        echo "L = $L, R = $R<br>";

        for ($i = $L; $i <= $R; $i++) {
            echo $i . "<br>";
        }
    }
    ?>
</body>
</html>
