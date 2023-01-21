<?php
if ($_POST) {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $this->loginService->deleteUser($id);
        header('Location: /admin/Users');
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
                        <h2>User Management</h2>
                    </div>
                    <div class="col text-right">
                        <button type="button" name="add_user" id="add_user" class="btn btn-success btn-sm"
                                onclick="toAddPage()">
                            +   Add User
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="user_table">
                        <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Phone Number</th>
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
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phoneNumber']; ?></td>
                                <td>
                                    <form method="post" action="editUser">
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
            window.location.href = "<?= '/admin/addUser'?>";
        }
    </script>

<?php
include __DIR__ . '/../footer.php';
?>