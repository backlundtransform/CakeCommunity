<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */

class PostsController extends AppController {
  




/**
 * index method
 *
 * @return void
 */



    public function beforeFilter(){
     	            $this->Auth->allow('index', 'view', 'search');
			parent::beforeFilter();
			
       
	
     }   
     
     function search()
{
      	$this->ban_check();
	
		$this->Post->recursive = 0;


               $this->paginate = array('order' => 'created DESC');



		$this->set('posts', $this->paginate());
		             	

  

    if (!empty($this->data)) {
        $searchstr = $this->data['Post']['search'];
        $this->set('searchstring', $this->data['Post']['search']);
        $conditions = array(
            'conditions' => array(
            'or' => array(
                "Post.title LIKE" => "%$searchstr%",
                "Post.content LIKE" => "%$searchstr%"
            )
            )
        );
        $this->set('posts', $this->Post->find('all', $conditions));
    }
}

	public function index() {
		$this->ban_check();
	
		$this->Post->recursive = 0;


               $this->paginate = array('order' => 'created DESC');



		$this->set('posts', $this->paginate());
	
		 $this->set('_serialize', array('posts'));
		


		             	}
	
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ban_check();
    	$this->paginate = array('limit'=>15,
			'conditions' => array('Comment.post_id' => $id)
		);
			
		$paginate = $this->paginate('Comment');
		$this->Post->updateAll(array('views'=>'views+1'), array('Post.id'=>$id));


	if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));




               $users = $this->Post->Comment->User->find('list', array('conditions' => array('username' => $this->Auth->user('username')) ));

		$posts = $this->Post->find('list', array('conditions' => array('id' => $id) ));

		$this->set(compact('users', 'posts','paginate'));
                      
             $commentnumber = $this->Post->Comment->find('list', array('conditions' => array('Comment.post_id' => $id)));

			return   $commentnumber;

	}
	
//


     
/**
 * add method
 *
 * @return void
 */
	public function add() {
	$this->ban_check();
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$category = $this->Post->Postcat->generateTreeList(null, null, null,"_");
	
		$this->set(compact('category'));
		$users = $this->Post->User->find('all');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ban_check();
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$users = $this->Post->User->find('all');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
 


public function isAuthorized($user) {
	



	if (in_array($this->action, array('add', 'edit', 'delete')) && $user['roles'] == 'admin') {
		return true;
			}else{
		return false;
}

	  }

  }