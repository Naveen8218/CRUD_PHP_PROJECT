<?php
include('header.php');
include('footer.php');
?>

<section id="head2">
    <div class="container py-5 text-center">
        <table class="table table-bordered  table-striped my-3" id="myTable">
            <thead class="table-success">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>

            <?php
            include_once("connection.php");
            $sql = "SELECT * FROM person";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");


            if (mysqli_num_rows($result) > 0) {



                ?>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                            <td>
                                <?php echo $row['id'] ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>
                            <td>
                                <?php echo $row['address'] ?>
                            </td>
                            <td>
                                <?php echo $row['email'] ?>
                            </td>
                            <td>
                                <?php echo $row['phone'] ?>
                            </td>
                            <td>
                                <a href='edit.php?id= <?php echo $row['id'] ?>' class='btn btn-info btn-sm mx-2 px-3 shadow'>
                                    EDIT
                                </a>
                                <a href='delete_inline.php?id= <?php echo $row['id'] ?>'
                                    class='btn btn-danger  btn-sm shadow mx-2'>
                                    DELETE
                                </a>
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>

            <?php } ?>
        </table>


    </div>


</section>