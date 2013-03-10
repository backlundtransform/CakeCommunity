<div class="tables">Search</div>
    <div class="innertube">



<br /><div id="search"><?php
echo $this->form->create('Post', array(
    'url' => array('controller' => 'posts', 'action' => 'search'),
             'inputDefaults' => array(
        'label' => false,
        'div' => false,


    )));
echo $this->form->input('Post.search', array('Class' => 'searchQueryFl'));
echo $this->form->end('Search');
?> </div> </div>
