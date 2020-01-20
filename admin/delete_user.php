<!-- header -->
<!-- use kora hoi nai kothao. -->
<?php
include('../config.php');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    deleteUser($user_id);
}

function deleteUser($user_id) {
    global $conn;
    $sql = "DELETE FROM users WHERE id=$user_id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "User successfully deleted";
        header("location: ./users.php");
        exit(0);
    }
}
?>


