<!-- header -->
<?php include('../config.php'); ?>
<?php include('./include/check_user.php') ?>
<!-- Check User login or not-->
<?php include('./header.php'); ?>
<?php include('./include/database_query.php'); ?>

<?php $committee_list = getCommittees() ?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php include('./leftmenu.php'); ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <div>
                <h3>Committee List</h3>
            </div>
            <!-- Main Data -->
            <?php include('./include/success.php') ?>
            <?php
                if (!$committee_list) {
                    echo "<h2 style='color:red'>Committee not found !!!</h2>";
                } else {
            ?>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    All Committee List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl. no</th>
                                    <th>Name</th>
                                    <th>Committee Type</th>
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
                                    <th>Name</th>
                                    <th>Committee Type</th>
                                    <th>Author</th>
                                    <th>Created Time</th>
                                    <th>Publish</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($committee_list as $committee) : ?>
                                <?php 
                                            echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td> <a href=".BASE_URL . 'committeeDetails.php?type_id=' . $committee['type_id'] . '&id=' . $committee['id']." target='_blank'>" . $committee['name'] . "</a></td>";
                                            echo "<td>" . $committee['type_name'] . "</td>";
                                            echo "<td>" . $committee['created_user_name'] .'('. $committee['created_user_id']. ')' . "</td>";
                                            echo "<td>" . $committee['created_time'] . "</td>";
                                            // echo "<td> <img style='width: 100;' src=".BASE_URL."upload/notices/". $committee['file'] ." /></td>";
                                            ?>
                                <td>
                                    <?php if ($committee['is_published'] == true): ?>
                                        <a href="committee.php?unpublishCommittee=<?php echo $committee['id']; ?>" title='Unpublish'
                                            class="fa fa-check btn unpublish"></a>
                                    <?php else: ?>
                                        <a href="committee.php?publishCommittee=<?php echo $committee['id']; ?>" title='Publish'
                                            class="fa fa-times btn publish"></a>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="committee_create.php?edit_committee=<?php echo $committee['id']; ?>" title='Edit'
                                        class="fa fa-pencil btn edit"></a>
                                </td>
                                <td>
                                    <a class="fa fa-trash btn delete" 
                                    title='Delete' style="cursor: pointer;"
                                    onclick="Delete(<?php echo $committee['id']; ?>)"></a>
                                </td>
                                <?php echo "</tr>"; $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="card-footer small text-muted">@tonmoyrudra</div>
            </div>
            <?php } ?>
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
        window.location.href = "committee_create.php?delete_committee=" + id;
    }
}
</script>