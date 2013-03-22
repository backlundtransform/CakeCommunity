<?php foreach ($posts as $post) {
    unset($post['Post']);
}


echo json_encode($post['Post']);


?>