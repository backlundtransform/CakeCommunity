<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
 

class UsersController extends AppController {


     public function beforeFilter(){
     	
			parent::beforeFilter();
            $this->Auth->allow('add');
			
			
		
       
	
     }
	 
	 
     public function isAuthorized($user) {
     	$this->role = $user['roles'];
		
	    if ($user['roles'] == 'admin') {
	        return true;
	    }
		
		
	    if (in_array($this->action, array('edit', 'delete'))) {
	        if ($user['id'] != $this->request->params['pass'][0]) {
	            return false;
	        }
	    }
	    return true;
	}
	


 public function login() {

          if ($this->request->is('post')){
            

             if ($this->Auth->login()){
               

                 $this->redirect("/");
             }else{
               
                  $this->Session->setFlash('Your username/password combination was incorrect');
             }

          }
        }
        
        public function logout() {
	 $this->redirect($this->Auth->logout());
	}
	public function index() {
          $this->paginate = array(
        'limit' => 10
        )
    ;
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());


	}
	


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 
            public function avatar($id = null) {
                    $this->User->id = $id;


                    if ($this->request->is('post')) {

                       $this->User->set(array(
                                           'image_url' => $this->data['User']['image_url']['name']
                                                                        ));
                                                                           $this->User->save();

                   move_uploaded_file($this->data['User']['image_url']['tmp_name'], WWW_ROOT.DS.'img/'.$this->data['User']['image_url']['name']);
                     	$this->redirect(array('action' => 'view',$id));
                   }
                     }
	public function add() {
		
	
		
		if ($this->request->is('post')) {

			$this->User->create();

			if ($this->User->save($this->request->data)) {

                                    $this->User->saveField('registred', date("Y-m-d H:i:s"));
			 
				$this->Session->setFlash(__('The user has been saved'));

				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
