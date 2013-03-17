<?php foreach ($threads as $thread) {
    unset($thread['Post']);
}
echo json_encode($thread['Thread']);

?>