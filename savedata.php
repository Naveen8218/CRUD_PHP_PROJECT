<?php

include('header.php');
include('footer.php');

include("connection.php");
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id =  test_input($_POST['id']);
$name = test_input($_POST['name']);
$address = test_input($_POST['address']);
$email = test_input($_POST['email']);
$phone = test_input($_POST['phone']);


if ((!empty($name)) && (!empty($address)) && (!empty($email)) && (!empty($phone))) {
    if ((preg_match("/^[A-Za-z ]{3,30}$/", $name)) && (preg_match("/^[a-zA-z ]*$/", $address)) && (preg_match("/^[A_Za-z0-9]{1,}@[A_Za-z]{3,}[.]{1}[A_Za-z.]{2,6}$/", $email)) && (preg_match("/^[789][0-9]{9}$/", $phone))) {

$sql = "UPDATE person set name = '{$name}', address = '{$address}', email = '{$email}',phone = '{$phone}' WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query Not Executed" . mysqli_connect_error());
}
header("Location: http://localhost/crud_self/index.php");
mysqli_close($conn);

    }
    else {
        Echo "<div class='alert alert-danger alert-dismissible fade show h1' role='alert'>
        <strong>Invalid Entry ! </strong> Fill Form Correctly.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }
}
?>