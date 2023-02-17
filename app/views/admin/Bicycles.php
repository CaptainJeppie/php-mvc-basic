<?php
include __DIR__ . '/../adminheader.php';
?>


    <div class="col-sm-12 py-4">
        <span id="message"></span>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2>Bicycle Management</h2>
                    </div>
                    <div class="col text-right">
                        <div class="col text-right">
                            <a href="addBicycle" class="btn btn-success btn-sm"> + Add Bicycle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="user_table">
                        <thead>
                        <tr>
                            <th>Bike Id</th>
                            <th>Bike Name</th>
                            <th>Availability</th>
                            <th>Bike Category</th>
                            <th>Deposit</th>
                            <th>Price Per Day</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($model as $row) {
                            ?>
                            <tr id="<?php echo $row['id']; ?>">
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['isAvailable']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['borg']; ?></td>
                                <td><?php echo $row['priceperday']; ?></td>
                                <td>
                                    <form method="post" action="editBicycle">
                                        <input type="submit" name="edit" class="btn btn-warning btn-sm edit"
                                               value="Edit" id="edit">
                                        <input type="hidden" id="id" name="edit" value="<?php echo $row['id']; ?>">
                                        <button type="button" name="delete" class="btn btn-danger btn-sm delete"
                                                value="<?php echo $row['id']; ?>" id="delete"
                                                onclick="deleteBike(<?php echo $row['id']; ?>)"> Delete
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
        let bikes = [];

        // Fetch the initial list of bikes from the server
        fetch("/bikes.json")
            .then(response => response.json())
            .then(data => {
                bikes = data;
            });

        function deleteBike(bikeId) {
            // Send a DELETE request to the server with the bikes ID
            fetch("/api/catalogue?id=" + bikeId, {
                method: "DELETE"
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        // If the server returns a success message, update the table
                        bikes = bikes.filter(bicycle => bicycle.id !== bikeId);
                        document.getElementById(bikeId).remove();
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