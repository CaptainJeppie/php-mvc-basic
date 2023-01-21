<?php
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
                                onclick="toAddUserPage()"> + Add User
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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        /** @var array $model */
                        foreach ($model as $row) {
                            ?>
                            <tr id="<?php echo $row['id']; ?>">
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phoneNumber']; ?></td>
                                <td>
                                    <form method="post" action="editUser">
                                        <input type="submit" name="edit" class="btn btn-warning btn-sm edit"
                                               value="Edit" id="edit">
                                        <input type="hidden" id="id" name="edit" value="<?php echo $row['id']; ?>">

                                        <button type="button" name="delete" class="btn btn-danger btn-sm delete"
                                                value="<?php echo $row['id']; ?>" id="delete"
                                                onclick="deleteUser(<?php echo $row['id']; ?>)"> Delete
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
        let users = [];

        // Fetch the initial list of users from the server
        fetch("/users.json")
            .then(response => response.json())
            .then(data => {
                users = data;
            });

        function deleteUser(userId) {
            // Send a DELETE request to the server with the user's ID
            fetch("/api/user?id=" + userId, {
                method: "DELETE"
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        // If the server returns a success message, update the table
                        users = users.filter(user => user.id !== userId);
                        document.getElementById(userId).remove();
                    } else {
                        // If the server returns an error, display it
                        alert(data.message);
                    }
                });
        }

        function toAddUserPage() {
            window.location.href = "/admin/addUser";
        }
    </script>

<?php
include __DIR__ . '/../footer.php';
?>