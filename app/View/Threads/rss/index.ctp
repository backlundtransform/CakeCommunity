<?php

$channelData = array(
    'title'=>'Our Current Threads',
    'link'=>$this->html->url(array(
        'controller'=>'threads',
        'action'=>'index',
        'ext'=>'rss'
    )),
    'description'=>'View the most recent posts from our cakephp blog',
    'language'=>'en-us'
);

$this->set('channelData', $channelData);

foreach($threads as $thread) {
    echo $this->rss->item(
        array(),
        array(
            'title'=>$thread['Thread']['title'],
            'link'=>array(
                'controller'=>'thread',
                'action'=>'view', $thread['Thread']['id']
            ),
            'guid'=>array(
                'controller'=>'thread',
                'action'=>'view', $thread['Thread']['id']
            ),
            'description'=>strip_tags($thread['Thread']['content']),
            'pubDate'=>$thread['Thread']['created']
        )
    );
}

?>