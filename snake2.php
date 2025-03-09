<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ヘビ数</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/ress@5.0.2/dist/ress.min.css"> -->
    <link rel="stylesheet" href="./style.css">
</head>
<body style="padding: 50px;">
    
    <h1>ヘビ数の計算</h1>
    <p>10以上の整数LとRを入力してください。</p>
    <form method="post">
        <label for="L">Lを入力してください:</label>
        <input type="number" id="L" name="L" min="10" max="1000000000000000000" required>
        <br>
        <label for="R">Rを入力してください:</label>
        <input type="number" id="R" name="R" min="10" max="1000000000000000000" required>
        <br>
        <button type="submit">送信</button>
    </form>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $L = intval($_POST['L']);
    $R = intval($_POST['R']);
    // LがRより大きい場合はエラーを出力して処理を中断
    if ($L > $R) {
        echo "エラー: RはLより大きくしてください。";
        exit;
    }

    // デバック
    echo "L = {$L} <br>";
    echo "L = {$R} <br><br>";

    $count = 0;
    $snakeNums = [];

    // LからRまでループ処理
    for ($num = $L; $num <= $R; $num++) {
        $n = $num;
        $digits = []; // 桁という意味

        // デバック
        echo "num = {$num} <br>";

        // numを10で割り続け、あまりをdigitsに格納（数字が10以上まで繰り返す）
        while ($n >= 1) {
            $digits[] = $n % 10; // 10で割った余りを格納
            $n = (int)($n / 10);// 10で割った整数部分だけ格納。（これにより次の桁に移動する）
        }

        // デバック
        echo "digits = ";
        print_r($digits);
        echo "<br>";

        // echo "digits = ".;
        // print_r($digits);
        // echo "<br>";


        $flag = true;
        for($i = 0; $i < count($digits) - 1; $i++){
            if ($digits[$i] >= $digits[count($digits) - 1]) {
                $flag = false;

                // デバック
                echo "先頭の".$digits[count($digits) - 1]."以上の数字";
                echo $digits[$i]."があるのでヘビ数でない<br>";
                break;  // 条件を満たさない場合はループを抜ける
            }
        }

        if ($flag) {
            $count++;
            $snakeNums[] = $num;

            // デバック
            echo "ヘビ数(先頭の桁が最大)<br>";
        }
        
        
        echo "<br>";

    }

    // 結果の出力（フォーマット：ヘビ数は、count個。snakeNums1 snakeNums2 ... です。）
    echo "ヘビ数は、{$count}個。";
    if (!empty($snakeNums)) {
        echo implode(",", $snakeNums);
    }
    echo "です。\n";

}
?>

</body>
</html>