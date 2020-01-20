<!-- header -->
<?php include('../config.php'); ?>
<?php include('./include/check_user.php') ?>
<!-- Check User login or not-->
<?php include('./header.php'); ?>
<?php include('./include/database_query.php'); ?>


<div id="wrapper">
    <!-- Sidebar -->
    <?php
    include('./leftmenu.php')
    ?>


    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Main Data -->
            <div>
                <?php if ($isEditingNotice === false) : ?>
                    <h3>Create New Notice</h3>
                <?php else : ?>
                    <h3>Edit Notice</h3>
                <?php endif ?>
            </div>

            <!-- validation - success - errors for the form -->
            <?php include('./include/success.php') ?>
            <?php include('./include/errors.php') ?>
            <!-- validation - success - errors for the form -->
            <form method="post" enctype="multipart/form-data" style="padding: 5% 9%;">

                <!-- if editing notice, the id is required to identify that notice  -->
                <?php if ($isEditingNotice === true) : ?>
                    <input type="hidden" name="notice_id" value="<?php echo $notice_id; ?>">
                    <input type="hidden" name="slug_notice" value="<?php echo $slug_notice; ?>">
                <?php endif ?>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input type="text" id="title" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Title" required="required" autofocus="autofocus">
                                <label for="title">Notice Title</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Notice Description: </label>
                            <div class="form-label-group">
                                <textarea name="description" id="description" required="required" cols="30" rows="10">
                                    <?php echo $description; ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p>Upload File</p>
                    <input type="file" name="file">
                </div>

                <!-- Only admin users can view publish input field -->
                <?php if ($login_user['user_role'] == "admin") : ?>
                    <!-- display checkbox according to whether post has been published or not -->
                    <?php if ($published == true) : ?>
                        <label class="checkBox">Publish
                            <input type="checkbox" value="1" name="publish" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                    <?php else : ?>
                        <label class="checkBox">Publish
                            <input type="checkbox" value="1" name="publish">
                            <span class="checkmark"></span>
                        </label>
                    <?php endif ?>
                <?php endif ?>
                <div style="text-align: center;">
                    <?php if ($isEditingNotice === true) : ?>
                        <button type="submit" class="updateBtn" id="submit" name="update_notice">Update </button>
                    <?php else : ?>
                        <button type="submit" class="createBtn" id="submit" name="create_notice">Create </button>
                    <?php endif ?>
                </div>
            </form>

        </div>
        <!-- footer here -->
        <?php
        include('./footer.php')
        ?>
    </div>
</div>


<script>
    CKEDITOR.replace('description', {
        height: 300,
        filebrowserUploadMethod: "form",
        filebrowserUploadUrl: "./include/upload_file.php"
    });
</script>