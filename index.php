<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MQ2 Gas Sensor Data</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f5f5dc; }
        h1 { color: #ff5733; }
        table { width: 80%; margin: auto; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid black; }
        th { background: #ffcc00; }
        td { background: #ffe0b2; }
    </style>
    <script>
        function fetchData() {
            fetch("fetch_data.php")
                .then(response => response.json())
                .then(data => {
                    let tableBody = document.getElementById("data");
                    tableBody.innerHTML = "";
                    data.forEach((row, index) => {
                        tableBody.innerHTML += `<tr>
                            <td>${index + 1}</td>
                            <td>${row.gas_level}</td>
                            <td>${row.timestamp}</td>
                        </tr>`;
                    });
                });
        }
        setInterval(fetchData, 5000); // Refresh data every 5 seconds
    </script>
</head>
<body onload="fetchData()">
    <h1>MQ2 Gas Sensor Data</h1>
    <table>
        <tr>
            <th>S.No</th>
            <th>Gas Level</th>
            <th>Timestamp</th>
        </tr>
        <tbody id="data"></tbody>
    </table>
</body>
</html>
