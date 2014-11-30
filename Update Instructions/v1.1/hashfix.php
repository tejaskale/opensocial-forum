<?php
require_once('assets/includes/core.php');

$query_one = "SELECT * FROM " . DB_POSTS;
$sql_query_one = mysqli_query($dbConnect, $query_one);

while ($sql_fetch_one = mysqli_fetch_assoc($sql_query_one)) {
    $text = $sql_fetch_one['text'];
    
    $hashfix_regex = '/(#\[([A-Za-z0-9_]+)\])/i';
    
    preg_match_all($hashfix_regex, $text, $matches);
    $match_i = 0;
    
    foreach ($matches[1] as $match) {
        $hashtag = $matches[1][$match_i];
        $hashkey = $matches[2][$match_i];
        $hashdata = SK_getHashtag($hashkey);
        
        if (is_array($hashdata)) {
            $hashid = '#[' . $hashdata['id'] . ']';
            $text = str_replace($hashtag, $hashid, $text);
        }
    }
    
    $sql_query_two = mysqli_query($dbConnect, "UPDATE " . DB_POSTS . " SET text='$text' WHERE id=" . $sql_fetch_one['id']);
}

echo 'Done! Now please delete this file.';
