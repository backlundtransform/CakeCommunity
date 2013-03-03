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
<<<<<<< HEAD


		$Categorylist = $this->Postcat->children();

	                $this->set(compact('Categorylist'));


            	return  $Categorylist;
=======
			$this->Postcat->recursive = 0;
		
		$this->set('postcats', $this->paginate());
		return   $this->Postcat->find('all');
>>>>>>> c2ebab6aa96e140f8808a1c0205ec7240c356d3b
		
	}
	public function admin_index() {

		




			$Categorylist = $this->Postcat->children();

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
           $this->paginate = array('order' => 'created DESC');
		if (!$this->Postcat->exists($id)) {
			throw new NotFoundException(__('Invalid postcat'));

			
		}
		

		
		$addedby =  $this->Postcat->Post->find('all', array('conditions' => array('cat' => $id)));
		$this->set(compact('addedby'));

		$options = array('conditions' => array('Postcat.' . $this->Postcat->primaryKey => $id));
		$this->set('postcat', $this->Postcat->find('first', $options));
	
	}
	
	public function main_view($id = null) {
		$this->ban_check();
           $this->paginate = array('order' => 'created DESC');
		if (!$this->Postcat->exists($id)) {
			throw new NotFoundException(__('Invalid postcat'));

			
		}
                    $postcat = $this->Postcat->Post->find('all', array('conditions' => array(
                        
                        'OR' => array(
            array('postcat.parent_id' => $id),
            array('post.id' => $id),
                        
                        ))));
                   	$this->set(compact('postcat'));

		

	
	}
	
	


/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
	 if (!empty($this->data)) {
            $this->Postcat->save($this->data);
            $this->redirect(array('action'=>'index'));
        } else {
            $parents[0] = "[ No Parent ]";
            $Categorylist = $this->Postcat->generateTreeList(null, null, null," _ ");
            if($Categorylist){
                foreach ($Categorylist as $key=>$value){
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
            if($this->Category->save($this->data)==false)
                $this->Session->setFlash('Error saving Category.');
            $this->redirect(array('action'=>'index'));
        } else {
            if($id==null) die("No ID received");
            $this->data = $this->Postcat->read(null, $id);
            $parents[0] = "[ No Parent ]";
            $Categorylist = $this->Postcat->generateTreeList(null, null, null," _ ");
            if($Categorylist) 
                foreach ($Categorylist as $key=>$value)
                    $parents[$key] = $value;
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
        $this->Category->id=$id;
        if($this->Category->delete()==false)
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
<<<<<<< HEAD
              }
=======



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

>>>>>>> c2ebab6aa96e140f8808a1c0205ec7240c356d3b
