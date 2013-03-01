<?php
App::uses('AppController', 'Controller');
/**
 * Postcats Controller
 *
 * @property Postcat $Postcat
 */
class PostcatsController extends AppController {

/**
 * index method
 *
 * @return void
 
 
 */
 
 public function index() {
 	$this->ban_check();
			$this->Postcat->recursive = 0;
		
		$this->set('postcats', $this->paginate());
		return   $this->Postcat->find('all');
		
	}
	public function admin_index() {
			$this->Postcat->recursive = 0;
		
		$this->set('postcats', $this->paginate());
		return   $this->Postcat->find('all');
		
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
           $this->paginate = array('order' => 'created DESC');
		if (!$this->Postcat->exists($id)) {
			throw new NotFoundException(__('Invalid postcat'));
			
		}
		
		$addedby =  $this->Postcat->Post->find('all', array('conditions' => array('cat' => $id)));
		$this->set(compact('addedby'));

		$options = array('conditions' => array('Postcat.' . $this->Postcat->primaryKey => $id));
		$this->set('postcat', $this->Postcat->find('first', $options));
	
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Postcat->create();
			if ($this->Postcat->save($this->request->data)) {
				$this->Session->setFlash(__('The postcat has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postcat could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Postcat->exists($id)) {
			throw new NotFoundException(__('Invalid postcat'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Postcat->save($this->request->data)) {
				$this->Session->setFlash(__('The postcat has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postcat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Postcat.' . $this->Postcat->primaryKey => $id));
			$this->request->data = $this->Postcat->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Postcat->id = $id;
		if (!$this->Postcat->exists()) {
			throw new NotFoundException(__('Invalid postcat'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Postcat->delete()) {
			$this->Session->setFlash(__('Postcat deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Postcat was not deleted'));
		$this->redirect(array('action' => 'index'));
	}



	public function isAuthorized($user) {
		if (in_array($this->action, array('admin_index', 'admin_add', 'admin_edit', 'admin_delete')) && $user['roles'] == 'admin')
		{
			return true;
		}
			else
		{
			return false;
		}
	}

}

