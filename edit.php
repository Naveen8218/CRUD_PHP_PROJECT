<?php
include('header.php');
include('footer.php');


include("connection.php");
$id = $_GET['id'];
$sql = "SELECT * FROM person WHERE id = $id";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result))     {



        ?>



        <div class="container text-center py-5">
            <div>
                <h3 class="diaplay-4">Edit Record</h3>
            </div>

            <div class="row justify-content-center py-5">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form method="POST" action="savedata.php">
                       
                            <div class="form-row justify-content-center">
                                <div class="form-group col-8 py-2">
                                    <label for="name">Name</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value=" <?php echo $row['id'] ?>">
                                    <input type="text" class="form-control" id="name" name="name" value=" <?php echo $row['name'] ?>" required>
                                </div>

                                <div class="form-group col-8 py-2">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" required> <?php echo $row['address'] ?></textarea>
                                </div>


                                <div class="form-group col-8 py-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value=" <?php echo $row['email'] ?>" required>
                                </div>


                                <div class="form-group col-8 py-2">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control " id="phone" value=" <?php echo $row['phone'] ?>" required>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn  btn-info px-3 shadow-lg">UPDATE</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <?php
    }
} ?>