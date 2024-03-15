<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Data</title>
        <link rel="stylesheet" href="style.css">
        <!-- By. Septian.dwica (tiancode.me) -->
    </head>
    <body>
        <div class="container">
        <form method="post" action="">
            <button type="button" onclick="modalForm()">Add Student</button>
        </form>

        <?php
            include('db_connect.php');

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nim = $_POST['nim'];
                $name = $_POST['name'];
                $major = $_POST['major'];
                $batch = $_POST['batch'];

                try {
                    $stmt = $pdo->prepare("INSERT INTO students (std_nim, std_name, std_major, std_batch) VALUES (:std_nim, :std_name, :std_major, :std_batch)");
                    $stmt->bindParam(':std_nim', $nim);
                    $stmt->bindParam(':std_name', $name);
                    $stmt->bindParam(':std_major', $major);
                    $stmt->bindParam(':std_batch', $batch);

                    $stmt->execute();
            
                    $message = "Student data added successfully!";
                    echo "<script type='text/javascript'>alert('$message');</script>";

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }

            try {
                $orderbynim = isset($_GET['asc']) ? 'ASC' : (isset($_GET['desc']) ? 'DESC' : '');

                $stmt = $pdo->prepare("SELECT * FROM students ORDER BY std_nim $orderbynim");
                $stmt->execute();

                echo "<table border='1'>
                        <tr>
                            <th>Student NIM</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Batch</th>
                        </tr>";

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['std_nim']}</td>
                            <td>{$row['std_name']}</td>
                            <td>{$row['std_major']}</td>
                            <td>{$row['std_batch']}</td>
                        </tr>";
                }

                echo "</table>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>

        <form class="order" method="get" action="">
            <button type="submit" name="asc">Order by NIM Asc</button>
            <button type="submit" name="desc">Order by NIM Desc</button>
        </form>

        <div id="modal" class="modal">
            <div class="modalForm">
                <div class="close-btn">
                    <span class="close" onclick="closeForm()">&times;</span>
                </div>

                <form method="post" action="">
                    <label for="nim">Student NIM</label>
                    <input type="text" name="nim" required="required">

                    <label for="name">Name</label>
                    <input type="text" name="name" required="required">
                    <label for="major">Major</label>
                    <select name="major" required="required">
                        <option value="CIS">CIS</option>
                        <option value="CIT">CIT</option>
                        <option value="VCD">VCD</option>
                        <option value="ID">ID</option>
                    </select>

                    <label for="batch">Batch</label>
                    <input type="text" name="batch" required="required">

                    <button type="submit" class="add">Add Student</button>
                </form>
            </div>
        </div>
        </div>
        

        <script>
            function modalForm() {
                document.getElementById('modal').style.display = 'block';
            }

            function closeForm() {
                document.getElementById('modal').style.display = 'none';
            }

            window.onclick = function (event) {
                let modalpopup = document.getElementById('myodal');
                if (event.target == modalpopup) {
                    closeForm();
                }
            }
        </script>
    </body>
</html>