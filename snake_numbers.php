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

        // カウンターと配列の初期化
        $C = 0;
        $S = [];

        // LからRまで１つづつ増やす
        for ($i = $L; $i <= $R; $i++) {
            // 計算する数の宣言（デバック）
            echo $i . "<br>";
            // 空の配列を用意
            $Y = [];
            // 計算してiの数が変わるといけないので、numに移す
            $num = $i;
            // 10で割れなくなるまで繰り返す
            while ($num >= 10) {
                // 10で割った余りを格納
                $Y[] = $num % 10;
                // 10で割った整数部分だけ格納
                $num = intval($num / 10);
            }
            // 最後の余りを格納
            $Y[] = $num;
            // 格納されたものの確認（デバック）
            echo "Y = [" . implode(", ", $Y) . "]<br>";

            

            $isSnakeNumber = true;
            for ($j = 0; $j < count($Y) - 1; $j++) {
                if ($Y[$j] >= $Y[count($Y) - 1]) {
                    $isSnakeNumber = false;
                    break;
                }
            }
             // 結果の出力（デバッグ用）
             echo $isSnakeNumber ? "これはヘビ数です" : "これはヘビ数ではありません";
             echo "<br><br>";

            // ヘビ数の場合、配列Sに格納しカウンターを増やす
            if ($isSnakeNumber) {
                $S[] = $i;
                $C++;
            }
        }
        // ヘビ数の個数と数値を出力
        echo "ヘビ数は、{$C}個。" . implode(" ", $S) . "です。";
    }
    ?>
</body>
</html>
