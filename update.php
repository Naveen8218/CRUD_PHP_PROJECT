<?php
include('header.php');
include('footer.php');
?>


<div class="container">
    <div class="row justify-content-center py-5 text-center">
        <div class="card shadow-lg">
            <h5 class="card-header ">EDIT RECORD</h5>
            <div class="card-body">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-row">
                        <div class="form-group  py-2">
                            <label for="id" class="h4">ID</label>
                            <input type="text" class="form-control" id="id" name="updateId" required>
                        </div>
                    </div>
                    <button type="submit" name="delete" class="btn  btn-info px-5 shadow-lg">SHOW</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['updateId'])) {
        include("connection.php");
        $id = $_POST['updateId'];
        $sql = "SELECT * FROM person WHERE id = $id";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

            
        
    
    ?>

    <div class="row justify-content-center py-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <form method="POST" action="savedata.php">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-8 py-2">
                            <label for="name">Name</label>
                            <input type="hidden" class="form-control" id="id" name="id"
                                value=" <?php echo $row['id'] ?>">
                            <input type="text" class="form-control" id="name" name="name"
                                value=" <?php echo $row['name'] ?>" required>
                        </div>

                        <div class="form-group col-8 py-2">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"
                                required> <?php echo $row['address'] ?></textarea>
                        </div>


                        <div class="form-group col-8 py-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value=" <?php echo $row['email'] ?>" required>
                        </div>


                        <div class="form-group col-8 py-2">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control " id="phone"
                                value=" <?php echo $row['phone'] ?>" required>
                        </div>
                    </div>
                <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn  btn-info px-3 shadow-lg">UPDATE</button>
                </div>
                </form>
<?php 
}
}
    }
?>
            </div>
        </div>
    </div>
</div>