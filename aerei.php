<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aeroporti</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
    <button id="btn-home">HOME</button>
</header>
<div>
    <?php
    global $db;
    require_once "db.php";
    $result = $db -> get_aerei();
    if($result == -1) {
        echo "errore";
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Numero registrazione</th>";
        echo "<th>Modello</th>";
        echo "<th>numero passeggeri</th>";
        echo "</tr>";
        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</div>
<script src="script.js"></script>
</body>
</html>
