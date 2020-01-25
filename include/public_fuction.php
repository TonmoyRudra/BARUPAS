<?php 

    // Global Veriable
    $committee_name = '';
    $committees = [];
    // Notices
    /* * * * * * * * * * * * * * *
    * Returns all published notice
    * * * * * * * * * * * * * * */
    function getPublishedNotices() {
        // use global $conn object in function
        global $conn;
        $sql = "SELECT * FROM notice_board WHERE is_published=true ORDER BY created_time DESC ";
        $result = mysqli_query($conn, $sql);
        // fetch all notice as an associative array called $notices
        $notices = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // $final_notices = array();
        // foreach ($notices as $post) {
        //     $post['topic'] = getPostTopic($post['id']); 
        //     array_push($final_notices, $post);
        // }
        return $notices;
    }
    // fetch single published notices by slug
    if (isset($_GET['slug'])) {
        $notice = getNoticeBySlug($_GET['slug']);
    }
    /* * * * * * * * * * * * * * *
    * Returns a single notice
    * * * * * * * * * * * * * * */
    function getNoticeBySlug($slug){
        global $conn;
        // Get single post slug
        $slug = $_GET['slug'];
        $sql = "SELECT * FROM notice_board WHERE slug='$slug'";
        $result = mysqli_query($conn, $sql);

        // fetch query results as associative array.
        $notice = mysqli_fetch_assoc($result);
        // if ($notice) {
        //     // get the topic to which this post belongs
        //     $post['topic'] = getPostTopic($post['id']);
        // }
        return $notice;
    }

    // Committee
    if (isset($_GET['type_id'])) {
        $committees = getAllPublishedCommittees($_GET['type_id']);
        $committee_name = getCommitteeTypeInfoByTypeId($_GET['type_id']);
    }
    /* * * * * * * * * * * * * * *
    * get all published commitees
    * * * * * * * * * * * * * * */
    function getAllPublishedCommittees($type_id) {
        global $conn;

        $sql = "SELECT * FROM committee WHERE is_published=true AND type_id = $type_id ORDER BY created_time DESC";
        $result = mysqli_query($conn, $sql);

        // fetch query results as associative array.
        $committees = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    * get commitee type info by type_id
    * * * * * * * * * * * * * * */
    function getCommitteeTypeInfoByTypeId($type_id)
    {
        global $conn;
        // Get single post slug
        $sql = "SELECT * FROM committee_type WHERE id =$type_id";
        $result = mysqli_query($conn, $sql);

        // fetch query results as associative array.
        // $committee_typeList = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $committeeTypeInfo = mysqli_fetch_assoc($result);
        // print_r($committeeTypeInfo);
        // if ($notice) {
        //     // get the topic to which this post belongs
        //     $post['topic'] = getPostTopic($post['id']);
        // }
        return $committeeTypeInfo;
    }

?>