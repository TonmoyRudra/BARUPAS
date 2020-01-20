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
                <h3>Notice List</h3>
            </div>
            <!-- Main Data -->
            <?php include('./include/success.php') ?>
            <?php
                $result = mysqli_query($conn, "select * from notice_board Order By created_time DESC");
                $notice_list = mysqli_num_rows($result);
                if (!$notice_list) {
                    echo "<h2 style='color:red'>Notice not found !!!</h2>";
                } else {
            ?>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    All Notice List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl. no</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created Time</th>
                                    <th>Publish</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sl. no</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created Time</th>
                                    <th>Publish</th>
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
                                            echo "<td> <a href=".BASE_URL.'noticeDetails.php?slug='.$row["slug"]." target='_blank'>" . $row['title'] . "</a></td>";
                                            echo "<td>" . $row['created_user_name'] .'('. $row['created_user_id']. ')' . "</td>";
                                            // echo "<td>" . $row['description'] . "</td>";
                                            echo "<td>" . $row['created_time'] . "</td>";
                                            // echo "<td> <img style='width: 100;' src=".BASE_URL."upload/notices/". $row['file'] ." /></td>";
                                            ?>
                                <td>
                                    <?php if ($row['is_published'] == true): ?>
                                        <a href="notice.php?unpublish=<?php echo $row['id']; ?>" title='Unpublish'
                                            class="fa fa-check btn unpublish"></a>
                                    <?php else: ?>
                                        <a href="notice.php?publish=<?php echo $row['id']; ?>" title='Publish'
                                            class="fa fa-times btn publish"></a>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="notice_create.php?edit_notice=<?php echo $row['id']; ?>" title='Edit'
                                        class="fa fa-pencil btn edit"></a>
                                </td>
                                <td>
                                    <a class="fa fa-trash btn delete" 
                                    title='Delete' style="cursor: pointer;"
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
        window.location.href = "notice_create.php?delete_notice=" + id;
    }
}
</script>