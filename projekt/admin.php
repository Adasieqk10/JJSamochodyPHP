<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: main.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: main.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora</title>

    <link rel="stylesheet" href="styles.css">

    <?php

    $conn = mysqli_connect("localhost", "root", "", "sprzedazsamochodow");

    $showAddedText = false;
    $showMissingText = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $marka = $_POST['marka'];
        $model = $_POST['model'];
        $cena = $_POST['cena'];
        $klient = $_POST['klient'];
        $data_sprzedazy = $_POST['data_sprzedazy'];

        if (!$marka || !$model || !$cena || !$klient || !$data_sprzedazy) {
            $showMissingText = true;
        } else {

            $sql1 = "INSERT INTO samochody (marka, model, cena, klient, data_sprzedazy) VALUES ('$marka', '$model', '$cena', '$klient', '$data_sprzedazy')";

            if (mysqli_query($conn, $sql1)) {
                $showAddedText = true;
            }
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql3 = "DELETE FROM samochody WHERE id = $id";
        mysqli_query($conn, $sql3);

        header("Location: admin.php");
    }

    $sql2 = "SELECT * FROM samochody";

    $res2 = mysqli_query($conn, $sql2);

    ?>
</head>

<body>
    <div class="container">

        <h2>Panel Administratora</h2>

        <table id="records">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Cena</th>
                    <th>Klient</th>
                    <th>Data sprzedaży</th>
                    <th>Usuń rekord</th>
                </tr>
            </thead>
            <tbody>
                <!-- Wyświetlanie -->
                <?php while ($row = mysqli_fetch_assoc($res2)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['marka']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['cena']; ?></td>
                        <td><?php echo $row['klient']; ?></td>
                        <td><?php echo $row['data_sprzedazy']; ?></td>
                        <td><a href="admin.php?delete=<?php echo $row['id']; ?>">Usuń</a></td>
                    </tr>
                <?php };
                mysqli_close($conn); ?>
            </tbody>
        </table>

        <div class="logout-container">
            <a href="admin.php?logout=true" class="logout-button">Wyloguj</a>
        </div>

        <h2>Dodawanie sprzedaży</h2>
        <form action="admin.php" method="post">
            <label>Marka: <input type="text" name="marka" required></label>
            <label>Model: <input type="text" name="model" required></label>
            <label>Cena: <input type="text" name="cena" required></label>
            <label>Klient: <input type="text" name="klient" required></label>
            <label>Data sprzedaży: <input type="date" name="data_sprzedazy" required></label>

            <input type="submit" value="Dodaj">

            <?php if ($showAddedText) echo "<p>Dodano!</p>"; ?>
            <?php if ($showMissingText) echo "<p>Błąd!</p>"; ?>
        </form>

    </div>
</body>

</html>