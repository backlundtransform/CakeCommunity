<?php foreach ($threads as $thread) {
    unset($thread['Thread']);
}
echo json_encode($thread['Thread']);

?>