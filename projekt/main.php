<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin.php");
    exit();
}

$login_error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'admin1234') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $login_error = true;
    }
}

$conn = mysqli_connect("localhost", "root", "", "sprzedazsamochodow");

$sql = "SELECT * FROM samochody";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sprzedaż samochdów - Użytkownik</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="container">

        <h2>Lista sprzedaży samochodów</h2>
        <table id="records">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Cena</th>
                    <th>Klient</th>
                    <th>Data sprzedaży</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['marka']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['cena']; ?></td>
                        <td><?php echo $row['klient']; ?></td>
                        <td><?php echo $row['data_sprzedazy']; ?></td>
                    </tr>
                <?php }
                mysqli_close($conn); ?>
            </tbody>
        </table>
        <br>

        <h2>Logowanie do panelu administratora</h2>
        <?php if ($login_error) : ?>
            <p style="color: red;">Nieprawidłowa nazwa użytkownika lub hasło.</p>
        <?php endif; ?>
        <form method="post" action="main.php">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required />

            <label for="password">Hasło:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required class="password-input" />
                <button type="button" id="togglePassword" class="password-toggle" aria-label="Pokaż hasło">👁️</button>
            </div>

            <input type="submit" value="Zaloguj" />
        </form>

    </div>

    <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) : ?>
        <div class="logout-container">
            <a href="logout.php" class="logout-button">Wyloguj</a>
        </div>
    <?php endif; ?>

    <script src="script.js"></script>
</body>

</html>