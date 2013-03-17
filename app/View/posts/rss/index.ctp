<?php

$channelData = array(
    'title'=>'Our Current Posts',
    'link'=>$this->html->url(array(
        'controller'=>'posts',
        'action'=>'index',
        'ext'=>'rss'
    )),
    'description'=>'View the most recent posts from our cakephp blog',
    'language'=>'en-us'
);

$this->set('channelData', $channelData);

foreach($posts as $post) {
    echo $this->rss->item(
        array(),
        array(
            'title'=>$post['Post']['title'],
            'link'=>array(
                'controller'=>'posts',
                'action'=>'view', $post['Post']['id']
            ),
            'guid'=>array(
                'controller'=>'posts',
                'action'=>'view', $post['Post']['id']
            ),
            'description'=>strip_tags($post['Post']['content']),
            'pubDate'=>$post['Post']['created']
        )
    );
}

?>