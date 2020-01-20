<?php
$login_user = $_SESSION['user'];
// general variables
global $errors;
$errors = [];
$isEditingUser = false;
$isEditingNotice = false;
$isEditingCommittee = false;

// User Variable
$username = '';
$email = '';
$mobile = '';
$role = '';
$address = '';

// Notice Variable
$title = '';
$slug_notice = '';
$published  = '';
$file  = '';
$description = '';


// Committee Variable
$committee_name = '';

/* * * * * * * * * * * * * * * * * * * * *
    * - User Related
    * * * * * * * * * * * * * * * * * * * * * */

// User Related
extract($_POST);
if (isset($_POST['create_user'])) {
    createUser($_POST);
}

// if user clicks the edit admin button
if (isset($_GET['edit_user'])) {
    $isEditingUser = true;
    $user_id = $_GET['edit_user'];
    editUser($user_id);
}

// if user clicks the update admin button
if (isset($_POST['update_user'])) {
    updateUser($_POST);
}

// if user click delete button
if (isset($_GET['delete_user'])) {
    $user_id = $_GET['delete_user'];
    deleteUser($user_id);
}

function createUser($request_values)
{
    global $conn, $username, $password, $role, $email, $mobile, $feature_image, $errors, $address;

    $username = esc($request_values['username']);
    $email = esc($request_values['email']);
    $password = esc($request_values['password']);
    $mobile = esc($request_values['mobile']);
    $role = esc($request_values['role']);
    $address = esc($request_values['address']);

    //check user alereay exists or not
    $sql = mysqli_query($conn, "select * from users where user_name='$username'");

    $row = mysqli_num_rows($sql); // if found any data

    if ($row == true) {
        // print_r("Hello"); exit();
        array_push($errors, "This user already exists, try another user name.");
    } else {

        //encrypt your password
        // $pass = md5($p);

        // Get image name
        $feature_image = $_FILES['feature_image']['name'];

        $file_name_array = explode(".", $feature_image);
        $extension = end($file_name_array);
        // $new_image_name = rand() . '.' . $extension;
        $new_image_name = $username . '.' . $extension;

        // image file directory
        $target = "../upload/images/" . $new_image_name;
        if (!move_uploaded_file($_FILES['feature_image']['tmp_name'], $target)) {
            // array_push($errors, "Failed to upload image. Please check file settings for your server");
        }

        $query = "insert into users values('','$username','$password','$role','','$email','$mobile','$address','$new_image_name')";
        mysqli_query($conn, $query);

        //upload image

        // mkdir("/upload/images/");
        // move_uploaded_file($_FILES['f']['tmp_name'], "../upload/images/".$_FILES['f']['name']);
        // $username = '';
        // $password = '';
        // $role = '';
        // $email = '';
        // $mobile = '';
        // $feature_image = '';
        // $address = '';
        $_SESSION['message'] = "Your user created successfully !!";
        echo "<script language='javascript'>
            window.location= './add_user.php'
            </script>";
        exit(0);
    }
}

function editUser($user_id)
{
    global $conn, $username, $role, $user_photo, $user_id, $email, $mobile, $address;

    $sql = "SELECT * FROM users WHERE id=$user_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $admin = mysqli_fetch_assoc($result);
    // print_r("Hello"); exit();
    //     echo "<pre>";
    //    print_r($admin);
    //    exit();
    // set form values ($username and $email) on the form to be updated
    $username = $admin['user_name'];
    $email = $admin['user_email'];
    $role = $admin['user_role'];
    $mobile = $admin['user_mobile'];
    $address = $admin['address'];
    $user_photo = $admin['user_photo'];
}

function updateUser($request_values)
{
    global $conn, $errors, $username, $isEditingUser, $id, $email, $mobile, $address;
    // get id of the admin to be updated
    $id = $request_values['id'];
    // set edit state to false
    $isEditingUser = false;

    $username = esc($request_values['username']);
    $email = $request_values['email'];
    $mobile = $request_values['mobile'];
    $password = $request_values['password'];
    $role = $request_values['role'];
    $address = $request_values['address'];

    $feature_image = $_FILES['feature_image']['name'];
    $file_name_array = explode(".", $feature_image);
    $extension = end($file_name_array);
    // $new_image_name = rand() . '.' . $extension;
    $new_image_name = $username . '.' . $extension;

    $mainQueryBody = "user_mobile ='$mobile', user_email='$email', address='$address'";

    if (!empty($feature_image)) {
        $mainQueryBody = $mainQueryBody . ", user_photo='$new_image_name'";
        // image file directory
        $target = "../upload/images/" . $new_image_name;
        if (!move_uploaded_file($_FILES['feature_image']['tmp_name'], $target)) {
            // array_push($errors, "Failed to upload image. Please check file settings for your server");
        }
    }

    if (!empty($role)) {
        $mainQueryBody = $mainQueryBody . ", user_role='$role'";
    }

    if (!empty($password)) {
        $mainQueryBody = $mainQueryBody . ", password='$password'";
    }

    //   echo "<pre>";
    //   print_r($this->upload);
    //   exit();
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        // encrypt the password (security purposes)
        // $password = md5($password);

        $query = "UPDATE users SET  $mainQueryBody  WHERE id=$id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = "User updated successfully";
        // header("Location:./users.php");
        echo "<script language='javascript'>
            window.location= './users.php'
            </script>";
        exit(0);
    }
}

function deleteUser($user_id)
{
    global $conn;
    $sql = "DELETE FROM users WHERE id=$user_id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "User successfully deleted";
        // header("location: ./users.php");
        echo "<script language='javascript'>
                window.location= './users.php'
            </script>";
        exit(0);
    }
}

/* * * * * * * * * * * * * * * * * * * * *
    * - Notice Related
    * * * * * * * * * * * * * * * * * * * * * */
extract($_POST);
// Create Notice
if (isset($_POST['create_notice'])) {
    createNotice($_POST);
}

// if user clicks the edit admin button
if (isset($_GET['edit_notice'])) {
    $isEditingNotice = true;
    $notice_id = $_GET['edit_notice'];
    editNotice($notice_id);
}

// if user clicks the edit admin button
if (isset($_GET['delete_notice'])) {
    $notice_id = $_GET['delete_notice'];
    deleteNotice($notice_id);
}

// if user clicks the update admin button
if (isset($_POST['update_notice'])) {
    updateNotice($_POST);
}

// if user clicks the publish/unpublish post button
if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
    $message = "";
    if (isset($_GET['publish'])) {
        $message = "Notice published successfully";
        $id = $_GET['publish'];
    } else if (isset($_GET['unpublish'])) {
        $message = "Notice successfully unpublished";
        $id = $_GET['unpublish'];
    }
    togglePublishNotice($id, $message);
}

function createNotice($request_values)
{
    global $conn, $title, $slug_notice, $description, $username, $user_id, $published, $file, $file_type, $errors;
    $login_user = $_SESSION['user'];
    $username = esc($login_user['user_name']);
    $user_id = esc($login_user['id']);
    $title = esc($request_values['title']);
    $slug_notice = makeSlug($title);

    $published = 0; // 0 = false, 1 means true
    if (!empty($request_values['publish'])) {
        $published = esc($request_values['publish']);
    }

    $description = $request_values['description'];
    $description = str_ireplace(array("\r", "\n", '\r', '\n'), '', $description);
    if (!isset($description)) {
        array_push($errors, "Notice description is required");
    }

    if (!empty($_FILES['file']['name'])) {
        // Get file name
        $file = $_FILES['file']['name'];
        $file_name_array = explode(".", $file);
        $extension = end($file_name_array);
        // $new_image_name = rand() . '.' . $extension;
        $new_image_name = $slug_notice . '.' . $extension;
        $file_type = $extension;


        // image file directory
        $target = "../upload/notices/" . $new_image_name;
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
            // array_push($errors, "Failed to upload image. Please check file settings for your server");
        }
    }



    // Ensure that no notice is saved twice. 
    $notice_check_query = "SELECT * FROM notice_board WHERE slug='$slug_notice' LIMIT 1";
    $result = mysqli_query($conn, $notice_check_query);

    if (mysqli_num_rows($result) > 0) { // if notice exists
        array_push($errors, "A notice already exists with that title.");
    }

    // Ensure that no notice is saved twice by this title name. 
    if (count($errors) == 0) {
        $query = "INSERT INTO notice_board (title, slug, description,created_user_id,created_user_name, is_published, created_time, updated_time, file, file_type) VALUES('$title', '$slug_notice', '$description', '$user_id', '$username', $published, now(), now(), '$new_image_name', '$file_type')";
        if (mysqli_query($conn, $query)) { // if post created successfully
            // $inserted_post_id = mysqli_insert_id($conn);

            $_SESSION['message'] = "Notice created successfully";
            echo "<script language='javascript'>
                    window.location= './notice_create.php'
                </script>";
            exit(0);
        }
    }
}

// Fetch notice and bind on Field
function editNotice($notice_id)
{
    global $conn,  $title, $slug_notice, $description, $username, $user_id, $published, $file, $file_type, $errors;

    $sql = "SELECT * FROM notice_board WHERE id=$notice_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $admin = mysqli_fetch_assoc($result);
    // print_r("Hello"); exit();
    //     echo "<pre>";
    //    print_r($admin);
    //    exit();
    // set form values ($username and $email) on the form to be updated
    $title = $admin['title'];
    $description = $admin['description'];
    $file = $admin['file'];
    $published = $admin['is_published'];
    $username = $admin['created_user_name'];
    $user_id = $admin['created_user_id'];
    $slug_notice = $admin['slug'];
}

function deleteNotice($notice_id)
{
    global $conn;
    $sql = "DELETE FROM notice_board WHERE id=$notice_id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Notice successfully deleted";
        // header("location: ./users.php");
        echo "<script language='javascript'>
                window.location= './notice.php'
            </script>";
        exit(0);
    }
}

function updateNotice($request_values)
{
    global  $conn, $title, $slug_notice, $description, $username, $user_id, $published, $file, $file_type, $errors, $isEditingNotice;
    // get id of the notice to be updated
    $id = $request_values['notice_id'];

    $login_user = $_SESSION['user'];
    $username = esc($login_user['user_name']);
    $user_id = esc($login_user['id']);
    $title = esc($request_values['title']);
    $slug_notice = makeSlug($title);
    $current_slug_notice = esc($request_values['slug_notice']);


    $published = 0; // 0 = false, 1 means true

    if (!empty($request_values['publish'])) {
        $published = esc($request_values['publish']);
    }

    $description = $request_values['description'];
    $description = str_ireplace(array("\r", "\n", '\r', '\n'), '', $description);
    if (!isset($description)) {
        array_push($errors, "Notice description is required");
    }


    // if (empty($featured_image)) { array_push($errors, "Files is required"); }

    if ($slug_notice != $current_slug_notice) {
        // Ensure that no notice is saved twice by this title name. 
        $notice_check_query = "SELECT * FROM notice_board WHERE slug='$slug_notice' LIMIT 1";
        $result = mysqli_query($conn, $notice_check_query);

        if (mysqli_num_rows($result) > 0) { // if notice exists
            array_push($errors, "A notice already exists with that title.");
        }
    }

    $mainQueryBody = "title = '$title', slug = '$slug_notice', description = '$description',is_published = $published, updated_time = now()";

    if (!empty($_FILES['file']['name'])) {
        // Get file name
        $file = $_FILES['file']['name'];
        $file_name_array = explode(".", $file);
        $extension = end($file_name_array);
        // $new_image_name = rand() . '.' . $extension;

        $new_image_name = $slug_notice . '.' . $extension;
        $file_type = $extension;

        $mainQueryBody = $mainQueryBody . ", file = '$new_image_name', file_type = '$file_type'";
        // image file directory
        $target = "../upload/notices/" . $new_image_name;
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
            // array_push($errors, "Failed to upload image. Please check file settings for your server");
        }
    }

    //   echo "<pre>";
    //   print_r($this->upload);
    //   exit();
    // submit if there are no errors in the form
    if (count($errors) == 0) {
        $query = "UPDATE notice_board SET $mainQueryBody where id='$id'";
        if (mysqli_query($conn, $query)) { // if  created successfully
            // $inserted_post_id = mysqli_insert_id($conn);
            // set edit state to false
            $isEditingNotice = false;

            $_SESSION['message'] = "Notice Updated successfully";
            echo "<script language='javascript'>
                    window.location= './notice.php'
                </script>";
            exit(0);
        }
    }
}

function togglePublishNotice($id, $message)
{
    global $conn;
    $sql = "UPDATE notice_board SET is_published=!is_published WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = $message;
        echo "<script language='javascript'>
             window.location= './notice.php'
            </script>";
        exit(0);
    }
}

/* * * * * * * * * * * * * * * * * * * * *
    * - Committee Related
    * * * * * * * * * * * * * * * * * * * * * */
extract($_POST);
// Create Notice
if (isset($_POST['create_committee'])) {
    createCommittee($_POST);
}

// if user clicks the edit admin button
if (isset($_GET['edit_committee'])) {
    $isEditingCommittee = true;
    $id = $_GET['edit_committee'];
    editCommittee($id);
}

// if user clicks the edit admin button
if (isset($_GET['delete_committee'])) {
    $id = $_GET['delete_committee'];
    deleteCommittee($id);
}

// if user clicks the update admin button
if (isset($_POST['update_committee'])) {
    updateNotice($_POST);
}

// if user clicks the publish/unpublish post button
if (isset($_GET['publishCommittee']) || isset($_GET['unpublishCommittee'])) {
    $message = "";
    if (isset($_GET['publishCommittee'])) {
        $message = "Committee published successfully";
        $id = $_GET['publishCommittee'];
    } else if (isset($_GET['unpublishCommittee'])) {
        $message = "Committee successfully unpublished";
        $id = $_GET['unpublishCommittee'];
    }
    togglePublishCommittee($id, $message);
}

function createCommittee($request_values)
{
    global $conn, $committee_type_id, $committee_type_name, $committee_name, $description, $username, $user_id, $is_published, $file, $errors;

    $login_user = $_SESSION['user'];
    $username = esc($login_user['user_name']);
    $user_id = esc($login_user['id']);
    $committee_type_id = esc($request_values['committee_type']);
    if (!isset($committee_type_id) || $committee_type_id == 0) {
        array_push($errors, "Committee type is required");
    } else {
        $committee_type_name = getCommitteeNameByTypeId($request_values['committee_type'])['type_name'];
    }
    // if (!isset($committee_type_id)) { array_push($errors, "Committee type is required"); }

    $committee_name = esc($request_values['committee_name']);
    if (!isset($committee_name)) {
        array_push($errors, "Committee Name is required");
    }

    $is_published = 0; // 0 = false, 1 means true
    if (!empty($request_values['publish'])) {
        $is_published = esc($request_values['publish']);
    }

    $description = $request_values['description'];
    $description = str_ireplace(array("\r", "\n", '\r', '\n'), '', $description);
    if (!isset($description)) {
        array_push($errors, "Committee description is required");
    }

    if (!empty($_FILES['file']['name'])) {
        // Get file name
        $file = $_FILES['file']['name'];
        $file_name_array = explode(".", $file);
        $extension = end($file_name_array);
        // $new_image_name = rand() . '.' . $extension;
        $new_image_name = $committee_name . '.' . $extension;


        // image file directory
        $target = "../upload/committee/" . $new_image_name;
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
            // array_push($errors, "Failed to upload image. Please check file settings for your server");
        }
    }

    // print_r($committee_type_id);
    // print_r($committee_type_name);
    // print_r($committee_name);
    // print_r($is_published);
    // print_r($description);
    // print_r($file);
    // exit(0);

    // Ensure that no notice is saved twice. 
    // $notice_check_query = "SELECT * FROM notice_board WHERE slug='$slug_notice' LIMIT 1";
    // $result = mysqli_query($conn, $notice_check_query);

    // if (mysqli_num_rows($result) > 0) { // if notice exists
    // 	array_push($errors, "A notice already exists with that title.");
    // }

    // Ensure that no notice is saved twice by this title name. 
    if (count($errors) == 0) {
        print_r($file);
        // exit(0);
        $query = "INSERT INTO committee (type_id, type_name, name, description, created_user_id, created_user_name, is_published, created_time, updated_time, file) VALUES('$committee_type_id', '$committee_type_name', '$committee_name', '$description', '$user_id', '$username', '$is_published', now(), now(), '$new_image_name')";
        if (mysqli_query($conn, $query)) { // if created successfully
            // $inserted_post_id = mysqli_insert_id($conn);

            $_SESSION['message'] = "Committee created successfully";
            echo "<script language='javascript'>
                    window.location= './committee_create.php'
                </script>";
            exit(0);
        }
    }
}
// Fetch notice and bind on Field
function editCommittee($id)
{
    global $conn, $committee_type_id, $committee_type_name, $committee_name, $description, $username, $user_id, $published, $file, $errors;

    $sql = "SELECT * FROM committee WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $admin = mysqli_fetch_assoc($result);
    // print_r("Hello"); exit();
    //     echo "<pre>";
    //    print_r($admin);
    //    exit();
    // set form values ($username and $email) on the form to be updated
    $committee_id = $admin['id'];
    $committee_type_id = $admin['type_id'];
    $committee_type_name = $admin['type_name'];
    $committee_name = $admin['name'];
    $description = $admin['description'];
    $file = $admin['file'];
    $published = $admin['is_published'];
    $username = $admin['created_user_name'];
    $user_id = $admin['created_user_id'];
}

function deleteCommittee($id)
{
    global $conn;
    $sql = "DELETE FROM committee WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Committee successfully deleted";
        // header("location: ./users.php");
        echo "<script language='javascript'>
                window.location= './committee.php'
            </script>";
        exit(0);
    }
}
function togglePublishCommittee($id, $message)
{
    global $conn;
    $sql = "UPDATE committee SET is_published=!is_published WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = $message;
        echo "<script language='javascript'>
             window.location= './committee.php'
            </script>";
        exit(0);
    }
}
/* * * * * * * * * * * * * * *
    * get all commitee type
    * * * * * * * * * * * * * * */
function getCommittees()
{
    global $conn;
    // Get single post slug
    $sql = "SELECT * FROM committee ORDER BY created_time DESC";
    $result = mysqli_query($conn, $sql);

    // fetch query results as associative array.
    $committees = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // if ($notice) {
    //     // get the topic to which this post belongs
    //     $post['topic'] = getPostTopic($post['id']);
    // }
    return $committees;
}

/* * * * * * * * * * * * * * *
    * get all commitee type
    * * * * * * * * * * * * * * */
function getCommitteeTypes()
{
    global $conn;
    // Get single post slug
    $sql = "SELECT * FROM committee_type";
    $result = mysqli_query($conn, $sql);

    // fetch query results as associative array.
    $committee_typeList = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // if ($notice) {
    //     // get the topic to which this post belongs
    //     $post['topic'] = getPostTopic($post['id']);
    // }
    return $committee_typeList;
}

/* * * * * * * * * * * * * * *
    * get commitee name by type_id
    * * * * * * * * * * * * * * */
function getCommitteeNameByTypeId($type_id)
{
    global $conn;
    // Get single post slug
    $sql = "SELECT type_name FROM committee_type WHERE id =$type_id";
    $result = mysqli_query($conn, $sql);

    // fetch query results as associative array.
    // $committee_typeList = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $committee = mysqli_fetch_assoc($result);
    // if ($notice) {
    //     // get the topic to which this post belongs
    //     $post['topic'] = getPostTopic($post['id']);
    // }
    return $committee;
}

/* * * * * * * * * * * * * * * * * * * * *
    * - Escapes form submitted value, hence, preventing SQL injection
    * * * * * * * * * * * * * * * * * * * * * */
function esc(String $value)
{
    // bring the global db connect object into function
    global $conn;
    // remove empty space sorrounding string
    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);
    return $val;
}

// Receives a string like 'Some Sample String'
// and returns 'some-sample-string'
function makeSlug(String $string)
{

    // if String contain english
    // if (strlen($string) == strlen(utf8_decode($string))) {
    //     $string = strtolower($string);
    // } 
    $slug = preg_replace('/\s+/u', '-', trim($string));
    return $slug;
}
