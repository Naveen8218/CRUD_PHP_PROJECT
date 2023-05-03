<?php

include('header.php');
include('footer.php');
?>

<?php
$Error = "";
if (isset($_POST['submit'])) {
    include("connection.php");


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = test_input($_POST['name']);
    $address = test_input($_POST['address']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    if ((!empty($name)) && (!empty($address)) && (!empty($email)) && (!empty($phone))) {
        if ((preg_match("/^[A-Za-z ]{3,30}$/", $name)) && (preg_match("/^[a-zA-z ]*$/", $address)) && (preg_match("/^[A_Za-z0-9]{1,}@[A_Za-z]{3,}[.]{1}[A_Za-z.]{2,6}$/", $email)) && (preg_match("/^[789][0-9]{9}$/", $phone))) {

            $sql = "INSERT INTO person (name, address, email, phone) VALUES('$name', '$address','$email','$phone')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Query Not Executed" . mysqli_connect_error());
            }
            //  header("Location: http://localhost/crud_self/index.php");
            mysqli_close($conn);
        } else {
            $Error = "Invalid Format";
        }

    }


} ?>







<div class="container text-center py-5">
    <div>
        <h3 class="diaplay-4">Add New Record</h3>
    </div>

    <div class="row justify-content-center py-5">
        <div class="card shadow-lg">
            <h5 class="card-header">ADD DATA</h5>
            <div class="card-body">
                <form method="POST">
                <div class="h3 text-center text-danger">
                            <?php echo $Error; ?>
                        </div>
                    <div class="form-row justify-content-center">


                        <div class="form-group col-8 py-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>

                        </div>



                        <div class="form-group col-8 py-2">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>

                        </div>


                        <div class="form-group col-8 py-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>

                        </div>


                        <div class="form-group col-8 py-2">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control " id="phone" required>

                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn  btn-outline-info  px-5 shadow my-3">SAVE</button> <br>
                   <div class="d-flex justify-content-around mt-3"> <a href="index.php" type="submit" name="home" class="btn  btn-outline-info  px-5 shadow"><i class="fa-solid fa-home"></i></a> 
                    <a href="add.php" type="reset" name="reset" class="btn  btn-outline-info px-5   shadow"><i class="fa-solid fa-rotate-left"></i></a></div>
                </form>

            </div>
        </div>
    </div>

</div>

</div>