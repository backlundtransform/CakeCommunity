<?php
App::uses('AppController', 'Controller');

/**

 */
class ThreadanswersController extends AppController {

/**



 */
 
   public function beforeFilter(){

                            $this->Auth->allow('index', 'view', 'widget','lastpost');

			parent::beforeFilter();


     }
     
   

	
	



   

    public function widget() {
 	$this->ban_check();



	$this->Threadanswer->recursive = 0;

	$Thread_answers = $this->Threadanswer->find('all', array('order' => 'created DESC'));



            	return  $Thread_answers;
		
	}
    public function index($id = null) {
      $this->ban_check();

       $thread_answers = $this->Threadanswer->find('all', array('conditions' => array('Threadanswer.user_id' => $id)));
	   
	   
	   


              

                        
                         }
	public function admin_index() {
		
		

	$this->Threadanswer->recursive = 0;
	 $this->paginate = array('order' => 'created DESC');
		$this->set('Thread_answers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {

		if (!$this->Threadanswer->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Thread_answer.' . $this->Thread_answer->primaryKey => $id));
		$this->set('Thread_answer', $this->Thread_answer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->ban_check();

 if ($this->request->is('post')) {

   $thread_id=$this->request->data['Threadanswer']['thread_id'];
         $this->Threadanswer->Thread->query("UPDATE `threads` SET `update`=NOW() WHERE  id= $thread_id");
		 $this->Threadanswer->Thread->query("UPDATE `threads` SET `Replies`= Replies+1 WHERE  id= $thread_id");
	$user_id=$this->request->data['Threadanswer']['user_id'];
         $this->Threadanswer->User->query("UPDATE `users` SET `Messages`= Messages+1 WHERE  id=$user_id");


  	$this->Threadanswer->create();
	  if ($this->Auth->user('roles') == 'user'){

		$data = Sanitize::clean($this->request->data, array('remove_html' => true));
		 }else{
		 	
			$data = $this->request->data;
			
		 }
	
   if ($this->Threadanswer->save($data)) {

				 $this->redirect($this->referer());

			}
		}
  		
		$users = $this->Threadanswer->User->find('list');
		$threads = $this->Threadanswer->find('list');
		$this->set(compact('users', 'threads'));

	} 
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		      $this->Threadanswer->id = $id;
$thread_id = $this->Threadanswer->field('thread_id');



		if (!$this->Threadanswer->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Threadanswer->save($this->request->data)) {
				$this->Session->setFlash(__('The answer has been saved'));
				$this->redirect(array('controller' => 'Posts', 'action' => 'view', $thread_id));
			} else {
				$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Thread_answer.' . $this->Threadanswer->primaryKey => $id));
			
		
			$this->request->data = $this->Threadanswer->find('first', $options);
		}
		$users = $this->Threadanswer->User->find('list');
		$threads = $this->Threadanswer->Post->find('list');
		$this->set(compact('users', 'threads'));
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
		$this->Threadanswer->id = $id;
		$thread_id = $this->Threadanswer->field('thread_id');
		if (!$this->Threadanswer->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
	
		if ($this->Threadanswer->delete()) {
			$this->Session->setFlash(__('Thread answer deleted'));
			 $this->Threadanswer->Thread->query("UPDATE `threads` SET `Replies`=Replies-1 WHERE id= $thread_id");
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
        $Thread_answerId = $this->request->params['pass'][0];
		if(isset($Thread_answerId) && isset($user['id']))
		{
      		if ($this->Threadanswer->isOwnedBy($Thread_answerId, $user['id']))
      		{
				return true;
			}
        }
		
    }

    return parent::isAuthorized($user);
}
}
