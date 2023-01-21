<?php
if ($_POST) {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $this->rentalService->deleteRental($id);
        header('Location: /admin/Rentals');
    }
}

include __DIR__ . '/../adminheader.php';
?>


    <div class="col-sm-12 py-4">
        <span id="message"></span>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2>Rental Management</h2>
                    </div>
                    <div class="col text-right">
                        <button type="button" name="add_rental" id="add_rental" class="btn btn-success btn-sm"
                                onclick="toAddPage()">
                            +   Add Rental
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="user_table">
                        <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Bike Id</th>
                            <th>User Email</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($model as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['orderId']; ?></td>
                                <td><?php echo $row['bicycleId']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['startDate']; ?></td>
                                <td><?php echo $row['endDate']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                    <form method="post" action="editRental">
                                        <input type="submit" name="edit" class="btn btn-warning btn-sm edit"
                                               value=" X " id="edit">
                                        <input type="hidden" id="id" name="edit" value="<?php echo $row['orderId']; ?>">
                                    </form>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="submit" name="delete" class="btn btn-danger btn-sm delete"
                                               value=" X " id="delete">
                                        <input type="hidden" id="id" name="delete" value="<?php echo $row['orderId']; ?>">

                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script>
        function toAddPage() {
            window.location.href = "<?= '/admin/addRental'?>";
        }
    </script>

<?php
include __DIR__ . '/../footer.php';
?>