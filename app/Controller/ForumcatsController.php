<?php
App::uses('AppController', 'Controller');
/**
 * 
 *
 * @property Forumcat $Forumcat
 */
class ForumcatsController extends AppController {

/**
 * index method
 *
 * @return void
 
 
 */
   public function beforeFilter(){

                            $this->Auth->allow('view', 'main_view');

			parent::beforeFilter();


     }
   
   

 public function index() {
 	$this->ban_check();
         

		$Categorylist = $this->Forumcat->children();

	                $this->set(compact('Categorylist'));


            	return  $Categorylist;
		
	}
	public function admin_index() {

		




			$Categorylist = $this->Forumcat->children();
			
		
	                $this->set(compact('Categorylist'));

                       return  $Categorylist;

		


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
       
		if (!$this->Forumcat->exists($id)) {
			throw new NotFoundException(__('Invalid Forumcat'));

			
		}
		
		$Forumcat = $this->Forumcat->Thread->find(
			'first', array(
				'conditions' => array(
					'Thread.cat' => $id
         	    )
			)
		);
		
		
		$options = array(
			'conditions' => array(
					'Thread.cat' => $id
         	    )
		);
		
		
		$this->set(
			'Forumcat', $this->Forumcat->Thread->find(
				'all', $options, $this->paginate(
					'Thread' , array(
						'Thread.cat' => $id
					)
				)
			)
		);
		return   $Forumcat;
		
		
	}
	
	public function main_view($id = null) {
		$this->ban_check();
          
		if (!$this->Forumcat->exists($id)) {
			throw new NotFoundException(__('Invalid Forumcat'));

			
		}
                    $Forumcat = $this->Forumcat->Thread->find('all', array('conditions' => array(
                        
                        'OR' => array(
            array('Forumcat.parent_id' => $id),
            array('Thread.id' => $id),
                        
                        ))));
                   	$this->set(compact('Forumcat', $this->paginate('Thread', array('Thread.cat' => $id))));

		

	
	}
	
	


/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
	
	 if (!empty($this->data)) {
            $this->Forumcat->save($this->data);
            $this->redirect(array('action'=>'index'));
        } else {
            $parents[0] = "[ No Parent ]";
                 $Category = $this->Forumcat->find('list', array('conditions' => array('parent_id' => 0)));
            if($Category){
                foreach ($Category as $key=>$value){
                  
                    if ($parents[0])
                    $parents[$key] = $value;
      }
		$this->set(compact('parents'));
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
	 if (!empty($this->data)) {
            if($this->Forumcat->save($this->data)==false)
                $this->Session->setFlash('Error saving Category.');
            $this->redirect(array('action'=>'index'));
        } else {
            if($id==null) die("No ID received");
            $this->data = $this->Forumcat->read(null, $id);
            $parents[0] = "[ No Parent ]";
            $Categorylist = $this->Forumcat->generateTreeList(null, null, null," _ ");
            if($Categorylist) 
                foreach ($Categorylist as $key=>$value)
                    $parents[1] = $value;
            $this->set(compact('parents'));
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
	  if($id==null)
            die("No ID received");
        $this->Forumcat->id=$id;
        if($this->Forumcat->delete()==false)
            $this->Session->setFlash('The Category could not be deleted.');
        $this->redirect(array('action'=>'index'));
	}



	public function isAuthorized($user) {
		if (in_array($this->action, array('admin_index', 'admin_add', 'admin_edit', 'admin_delete')) && $user['roles'] == 'admin')
		{
			return true;

		}else
		{
			return false;
		}
	}
              }
