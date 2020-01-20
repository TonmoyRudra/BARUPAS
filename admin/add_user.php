<!-- header -->
<?php include('../config.php'); ?>
<?php include('./include/check_user.php') ?>  <!-- Check User login or not-->
<?php include('./header.php'); ?>
<?php include('./include/database_query.php'); ?>
<?php 
    $disabled = $isEditingUser === true ? "readonly" : "";
?>
<div id="wrapper">
    <!-- Sidebar -->
    <?php
    include('./leftmenu.php')
    ?>


    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Main Data -->
            <div>
            <?php if ($isEditingUser === true) : ?>
                <h3>Edit User</h3>
            <?php else : ?>
                <h3>Add New User</h3>
            <?php endif ?>
            </div>

            <!-- validation - success - errors for the form -->
            <?php include('./include/success.php') ?>
            <?php include('./include/errors.php') ?>
            <!-- validation - success - errors for the form -->
            <form method="post" action="add_user.php" enctype="multipart/form-data" style="padding: 5% 9%;">

            <!-- if editing user, the id is required to identify that user -->
                <?php if ($isEditingUser === true) : ?>
                    <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                <?php endif ?>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="username" name="username" <?php echo $disabled ?> value="<?php echo $username; ?>" class="form-control" placeholder="User name" required="required" autofocus="autofocus">
                                <label for="username">User name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email address" required="required">
                                <label for="inputEmail">Email address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>" class="form-control" placeholder="Mobile" required="required" autofocus="autofocus">
                                <label for="mobile">Mobile</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <select class="form-control" name="role">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="editor">Editor</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <?php if($isEditingUser === true) :?>
                                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                                <?php else :?>
                                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                                <?php endif ?>
                                <label for="inputPassword">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <textarea name="address" id="user_address" cols="30" rows="5" class="form-control" placeholder="Address" required="required"><?php echo $address; ?></textarea>
                                <!-- <label for="user_address">Address</label> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div  class="col-md-6">
                        <p>Upload Photo</p>
                        <input type="file" name="feature_image"  onchange="previewImage(this);">
                    </div>
                    <div  class="col-md-6">
                        <?php if ($isEditingUser === true) : ?>
                            <img id="preview_image" width="150" height="200" src="<?php echo BASE_URL . 'upload/images/' . $user_photo ?>" alt="your image" />
                        <?php else : ?>
                            <img id="preview_image" width="150" height="200" src="../images/preview_default.png" alt="your image" />
                        <?php endif ?>
                    </div>

                </div>

                <div style="text-align: center;    margin-top: 5%;">
                    <?php if ($isEditingUser === true) : ?>
                        <button type="submit" class="updateBtn" id="submit" name="update_user">Update User </button>
                    <?php else : ?>
                        <button type="submit" class="createBtn" id="submit" name="create_user">Create User </button>
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
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>