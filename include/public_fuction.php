<?php 
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

?>