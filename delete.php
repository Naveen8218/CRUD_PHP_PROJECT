<?php
include('header.php');
include('footer.php');
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    include("connection.php");
    $sql = "DELETE FROM person
WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query Not Executed" . mysqli_connect_error());
    }
    header("Location: http://localhost/crud_self/index.php");
    mysqli_close($conn);
}


?>


<div class="container">
    <div class="row justify-content-center py-5 text-center">
        <div class="card shadow-lg">
            <h5 class="card-header ">DELETE DATA</h5>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group  py-2">
                            <label for="id" class="h4">ID</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                    </div>
                    <button type="submit" name="delete" class="btn  btn-danger px-5 shadow-lg">DELETE</button>
                </form>

            </div>
        </div>
    </div>
</div>