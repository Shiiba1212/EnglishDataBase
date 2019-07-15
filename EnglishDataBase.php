<?php

$db = null;
$sql = null;
$res = null;
$row = null;

function connectDB($dbname){
	return new SQLite3($dbname);
}

?>


<html>
<head>
    <title>PHP test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs-3.3.6/jqc-1.12.0,dt-1.10.11/datatables.min.css"/> 
    <script src="https://cdn.datatables.net/t/bs-3.3.6/jqc-1.12.0,dt-1.10.11/datatables.min.js"></script>
    <script>
        jQuery(function($){
            $("#english-table").DataTable();
        });
    </script>
</head>
<body>
<br><br>


    <!-- DBからデータの取得 -->
    <?php
        $db = connectDB("Vocabulary_Notebook.db");

        $sql = 'SELECT * FROM English_Vocabulary';
        $res = $db->query($sql);
    ?>

    <!-- 取得したデータの出力 -->
    <table id="english-table" class="table table-bordered">
        <thead>
            <tr><th>英語</th><th>品詞</th><th>日本語</th></tr>
        </thead>
        <tbody>
        <?php
            while($row = $res->fetchArray()){
                echo '<tr><td>'. $row[0] . '</td><td>'. $row[1] . '</td><td>'. $row[2] . '</td></tr>';
            }
            echo '</table>';
        ?>
        </tbody>
    </table>
</body>
</html>