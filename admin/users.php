<!-- header -->
<?php include('../config.php'); ?>
<?php include('./include/check_user.php') ?>
<!-- Check User login or not-->
<?php include('./header.php'); ?>
<?php include('./include/database_query.php'); ?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php include('./leftmenu.php'); ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <div>
                <h3>User List</h3>
            </div>
            <!-- Main Data -->
            <?php include('./include/success.php') ?>
            <?php
                $result = mysqli_query($conn, "select * from users");
                $user_list = mysqli_num_rows($result);
                if (!$user_list) {
                    echo "<h2 style='color:red'>No any user exists !!!</h2>";
                } else {
            ?>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    All User List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl. no</th>
                                    <th>Name</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th>Photo</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sl. no</th>
                                    <th>Name</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th>Photo</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['user_name'] . "</td>";
                                            echo "<td>" . $row['password'] . "</td>";
                                            echo "<td>" . $row['user_email'] . "</td>";
                                            echo "<td>" . $row['user_mobile'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>" . $row['user_role'] . "</td>";
                                            echo "<td> <img style='width: 100;' src=".BASE_URL."upload/images/". $row['user_photo'] ." /></td>";
                                            ?>
                                <td>
                                    <a href="add_user.php?edit_user=<?php echo $row['id']; ?>"
                                        class="fa fa-pencil btn edit"></a>
                                </td>
                                <td>
                                    <a class="fa fa-trash btn delete" title='Delete' style="cursor: pointer;"
                                    onclick="Delete(<?php echo $row['id']; ?>)"></a>
                                </td>
                                <?php echo "</tr>";
                                            $i++;
                                        }
                                        ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer small text-muted">@tonmoyrudra</div>
            </div>
        </div>

        <!-- footer here -->
        <?php
        include('./footer.php')
        ?>
    </div>
</div>

<script>
function Delete(id) {
    if (confirm("You want to delete this record ?")) {
        window.location.href = "users.php?delete_user=" + id;
    }
}
</script>