<?php
if ($_POST) {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $this->catalogueService->deleteBicycle($id);
        header('Location: /admin/Bicycles');
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
                        <h2>Bicycle Management</h2>
                    </div>
                    <div class="col text-right">
                        <button type="button" name="add_bike" id="add_bike" class="btn btn-success btn-sm"
                                onclick="toAddPage()">
                            +   Add Bicycle
                        </button>
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
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($model as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['isAvailable']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['borg']; ?></td>
                                <td><?php echo $row['priceperday']; ?></td>
                                <td>
                                    <form method="post" action="editBicycle">
                                        <input type="submit" name="edit" class="btn btn-warning btn-sm edit"
                                               value=" X " id="edit">
                                        <input type="hidden" id="id" name="edit" value="<?php echo $row['id']; ?>">
                                    </form>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="submit" name="delete" class="btn btn-danger btn-sm delete"
                                               value=" X " id="delete">
                                        <input type="hidden" id="id" name="delete" value="<?php echo $row['id']; ?>">
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
            window.location.href = "<?= '/admin/addBicycle'?>";
        }
    </script>

<?php
include __DIR__ . '/../footer.php';
?>