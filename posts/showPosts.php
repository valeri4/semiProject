<?php

function showPosts($dbCon) {
    $uId = userId();    //User Id Function from helpers
    $userName = userName(); //Username Function from helpers

    $sql = "SELECT * FROM posts
                        WHERE u_id ='$uId'";
    $result = $dbCon->query($sql);

    if (!$result) {
        die('Query failed: ' . $dbCon->error);
    }

    $userPost = array();
    while ($temp = $result->fetch_assoc()) {
        if ($temp['p_post']) {                  //Check if post is not empty
            
            $dateTime = date("H:i d/m/y", strtotime(str_replace('/', '-', $temp['p_time'])));
            
            echo '  <div class="post">
                    <div class="userTime">
                    <p class="userName">' .$userName . '</p>
                    <p class="pull-right">' .$dateTime.'</p>
                    </div>
                    <div class="postText">'.$temp['p_post'].'</div>
                    </div>';
            $userPost[] = array(                   //Add post to array
                'post' => $temp['p_post'],
                'time' => $temp['p_time']
            );
        }
    }
}

