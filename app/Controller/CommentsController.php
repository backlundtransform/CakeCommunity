<?php
App::uses('AppController', 'Controller');

/**
 * Comments Controller
 *
 * @property Comment $Comment
 */
class CommentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		
		
		$this->ban_check();
	$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->ban_check();
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->ban_check();
		
	
  if ($this->request->is('post')) {
  
  	$this->Comment->create();
	  if ($this->Auth->user('roles') == 'user'){
	 	
		$data = Sanitize::clean($this->request->data, array('remove_html' => true));
		 }else{
		 	
			$data = $this->request->data;
			
		 }
	
   if ($this->Comment->save($data)) {

				 $this->redirect($this->referer());

			}
		}
  		
		$users = $this->Comment->User->find('list');
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('users', 'posts'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		
	
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved'));
				$this->redirect(array('controller' => 'Posts', 'action' => 'view', $this->Comment->post_id()));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			
		
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('users', 'posts'));
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
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
	
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('Comment deleted'));
			$this->redirect($this->referer());
		}

		
	}
	
	public function isAuthorized($user) {
   
    if ($this->action === 'add' && $user['roles'] != 'banned') {
        return true;
    }elseif (in_array($this->action, array('edit', 'delete', 'admin_index', 'admin_view')) && $user['roles'] == 'admin')
		{
			return true;
		}
			else
		{
			return false;
		}
	

    
    if (in_array($this->action, array('edit', 'delete'))) {
        $commentId = $this->request->params['pass'][0];
		if(isset($commentId) && isset($user['id']))
		{
      		if ($this->Comment->isOwnedBy($commentId, $user['id']))
      		{
				return true;
			}
        }
		
    }

    return parent::isAuthorized($user);
}
}
