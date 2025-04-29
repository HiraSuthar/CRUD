<?php
$conn = mysqli_connect("localhost", "root", "", "note");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//fetch data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date']) && isset($_POST['note'])) {
    $date = date("j F Y", strtotime($_POST['date']));
    $day = date("l", strtotime($_POST['date']));
    $note = $_POST['note'];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "note");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "insert into notes(date, day, note) values ('$date', '$day', '$note')";
    $result = mysqli_query($conn, $sql);
}

//update data
$update = false;
if (isset($_POST['update'])) {
    $id = $_POST['update_id'];
    $udate = date("j F Y", strtotime($_POST['udate']));
    $uday = date("l", strtotime($_POST['udate']));
    $notes = $_POST['notes'];

    $updatesql = "UPDATE notes 
                   SET date='$udate',day='$uday', note='$notes'
                   WHERE id = $id";

    mysqli_query($conn, $updatesql);
    $update = true;
}

// Delete data
$delete = false;
if (isset($_POST['delete'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM notes WHERE id = '$id'";
    mysqli_query($conn, $query);
    $delete = true;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iNotes - Notes taking made easy</title>
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
    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Record Has Been Updated <strong>Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">Record Has Been Deleted <strong>Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <div class="container my-4">
        <h2>Add a Note</h2>
        <form method="post">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="note" class="form-label">Note</label>
                    <textarea class="form-control" id="note" name="note" rows="1" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <hr>

    <?php
    $filterDate = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
    $sql = "SELECT * FROM notes 
        WHERE YEARWEEK(STR_TO_DATE(date, '%e %M %Y'), 1) = YEARWEEK('$filterDate', 1) ORDER BY STR_TO_DATE(date, '%e %M %Y') ASC";
    $result = mysqli_query($conn, $sql);
    $id = 0;

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container'>";
        echo "<h2>Current Week</h2>";
        echo "<table class='table table-bordered border-secondary'>";
        echo "<tr class='table-active'>
                <th>ID</th>
                <th>Date</th>
                <th>Day</th>
                <th>Notes</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $id++;
            echo "<tr>
                <td>" . $id . "</td> 
                <td>" . $row['date'] . "</td>
                <td>" . $row['day'] . "</td>
                <td>" . $row['note'] . "</td>
                <td><button data-bs-toggle='modal' class='btn btn-primary' data-bs-target='#editModal{$row['id']}'>Edit</button></td>
                <td><button data-bs-toggle='modal' class='btn btn-danger' data-bs-target='#deleteModal{$row['id']}'>Delete</button></td>
            </tr>";

            // Delete model
            echo "
                <div class='modal fade' id='deleteModal{$row['id']}' tabindex='-1' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h3 class='modal-title' style='color:red;'>Warning!!</h3>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>

                        <div class='modal-body'>
                            Are You Sure Want To Delete This Data?
                        </div>
                        <div class='modal-footer'>
                            <form method='POST'>
                                <input type='hidden' name='delete_id' value='{$row['id']}'>
                                <button type='submit' name='delete' class='btn btn-primary'>Yes</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
                            </form>    
                        </div>
                        </div>
                    </div>
                </div>";

            //update modal
            echo "
                <div class='modal fade' id='editModal{$row['id']}' tabindex='-1' aria-labelledby='editModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title'>Edit Note</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                            </div>
                            <form method='POST'>
                                <div class='modal-body'> 
                                    <input type='hidden' name='update_id' value='{$row['id']}'>
                                    <div class='mb-3'>
                                        <label>Date</label>
                                        <input type='date' name='udate' class='form-control' value='" . date('Y-m-d', strtotime($row['date'])) . "' required>
                                    </div>
                                    <div class='mb-3'>
                                        <label>Notes</label>
                                        <input type='text' name='notes' class='form-control' value='{$row['note']}' required>
                                    </div>
                                    <div class='modal-footer'>
                                    <button type='submit' name='update' class='btn btn-success'>Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>";
        }
    }
    echo "</table>";
    echo "</div>";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>