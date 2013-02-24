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
     	
			parent::beforeFilter();
			
       
	
     }
	public function index() {
		$this->Post->recursive = 0;


               $this->paginate = array('order' => 'created DESC');



		$this->set('posts', $this->paginate());
		             	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

            $this->paginate = array('limit'=>5,
			
			'conditions' => array('Comment.post_id' => $id)
			
			);
			
			$paginate = $this->paginate('Comment');
			
			


	$this->Post->updateAll(array('views'=>'views+1'), array('Post.id'=>$id));


	if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
               echo $this->Auth->user('user_name');
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
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$category = $this->Post->Postcat->find('list');
	
		$this->set(compact('category'));
		$users = $this->Post->User->find('list');
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
		$users = $this->Post->User->find('list');
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
		$this->request->onlyAllow('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
   }