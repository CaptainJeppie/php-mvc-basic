<?php
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
                        <div class="col text-right">
                            <a href="addRental" class="btn btn-success btn-sm"> + Add Rental</a>
                        </div>
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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        /** @var array $model */
                        foreach ($model as $row) {
                            ?>
                            <tr id="<?php echo $row['orderId']; ?>">
                                <td><?php echo $row['orderId']; ?></td>
                                <td><?php echo $row['bicycleId']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['startDate']; ?></td>
                                <td><?php echo $row['endDate']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                    <form method="post" action="editRental">
                                        <input type="submit" name="edit" class="btn btn-warning btn-sm edit"
                                               value="Edit" id="edit">
                                        <input type="hidden" id="id" name="edit" value="<?php echo $row['orderId']; ?>">
                                        <button type="button" name="delete" class="btn btn-danger btn-sm delete"
                                                value="<?php echo $row['orderId']; ?>" id="delete"
                                                onclick="deleteRental(<?php echo $row['orderId']; ?>)"> Delete
                                        </button>
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
        let rentals = [];

        // Fetch the initial list of users from the server
        fetch("/rentals.json")
            .then(response => response.json())
            .then(data => {
                rentals = data;
            });

        function deleteRental(orderId) {
            // Send a DELETE request to the server with the rentals ID
            fetch("/api/rental?id=" + orderId, {
                method: "DELETE"
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        // If the server returns a success message, update the table
                        rentals = rentals.filter(rental => rental.id !== orderId);
                        document.getElementById(orderId).remove();
                    } else {
                        // If the server returns an error, display it
                        alert(data.message);
                    }
                });
        }
    </script>

<?php
include __DIR__ . '/../footer.php';
?>