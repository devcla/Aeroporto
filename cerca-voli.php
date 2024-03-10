<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cerca voli</title>
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
<form id="flight-search-form">
    <input type="text" id="departure-airport" placeholder="Aeroporto di partenza">
    <input type="text" id="arrival-airport" placeholder="Aeroporto di arrivo">
    <input type="date" id="travel-date">
    <button type="submit">Cerca voli</button>
</form>
<div id="search-results"></div>
<script src="script.js"></script>
</body>
</html>

