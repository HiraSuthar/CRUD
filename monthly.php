<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthy Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        table {
            border-collapse: collapse;
            padding: 10px 10px;
        }

        th,
        td {
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            border-bottom: 2px solid black;

        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "note");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM notes ORDER BY STR_TO_DATE(date, '%e %M %Y') ASC";
    $result = mysqli_query($conn, $sql);

    // Group by month
    $months = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $month = date('F Y', strtotime($row['date'])); // e.g., "March 2024"
        $months[$month][] = $row;
    }
    ?>
    <div class="container mt-4">
        <?php
        $monthNames = array_keys($months);
        for ($i = 0; $i < count($monthNames); $i += 2) {
            echo "<div class='row mb-4'>";
            $id = 0;
            // First Month
            echo "<div class='col-md-6'>";
            echo "<h5><b>{$monthNames[$i]}</b></h5>";
            echo "<table class='table table-bordered'>  
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Day</th>
                <th>Note</th>
            </tr>";
            foreach ($months[$monthNames[$i]] as $note) {
                $id++;
                echo "
                <tr>
                <td>$id</td>
                    <td>{$note['date']}</td>
                    <td>{$note['day']}</td>
                    <td>{$note['note']}</td>
                </tr>";
            }
            echo "</table></div>";

            // Second Month (if exists)
            if (isset($monthNames[$i + 1])) {
                $id = 0;
                echo "<div class='col-md-6'>";
                echo "<h5><b>{$monthNames[$i + 1]}</b></h5>";
                echo "<table class='table table-bordered'> 
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Note</th>
                    </tr>";
                foreach ($months[$monthNames[$i + 1]] as $note) {
                    $id++;
                    echo "
                    <tr>
                        <td>$id</td>
                        <td>{$note['date']}</td>
                        <td>{$note['day']}</td>
                        <td>{$note['note']}</td>
                    </tr>";
                }
                echo "</table></div>";
            }

            echo "</div>"; // end row
        }
        ?>
    </div>
</body>

</html>