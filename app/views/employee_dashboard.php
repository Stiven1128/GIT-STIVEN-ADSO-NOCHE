<?php
include('../includes/functions.php');
redirect_if_not_logged_in();
redirect_if_not_employee();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
</head>
<body>
    <h2>Employee Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <p><a href="logout.php">Logout</a></p>
    <!-- Agrega aquí el contenido accesible solo por empleados -->
</body>
</html>