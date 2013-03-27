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
         

		$Categorylist = $this->Postcat->children();

	                $this->set(compact('Categorylist'));


            	return  $Categorylist;
		
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
		
		
		$addedby =  $this->Postcat->Post->find(
			'all', array(
				'conditions' => array(
					'cat' => $id
				)
			)
		);
		
		
		$this->set(compact('addedby'));

		$options = array(
			'conditions' => array(
				'Postcat.' . $this->Postcat->primaryKey => $id
			)
		);
		$this->set(
			'postcat', $this->Postcat->find(
				'first', $options, $this->paginate(
					'Post' , array(
						'Post.cat' => $id
					)
				)
			)
		);
	
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
<<<<<<< HEAD
		public function admin_add() {

if (!empty($this->data)) {
=======
	public function admin_add() {

	 if (!empty($this->data)) {
>>>>>>> 9a68e4b438b5fa86b48466ae879b206e2030f595
            $this->Postcat->save($this->data);
            $this->redirect(array('action'=>'index'));
        } else {
            $parents[0] = "[ No Parent ]";

              $Category = $this->Postcat->find('list', array('conditions' => array('parent_id' => 0)));
            if($Category){
                foreach ($Category as $key=>$value){
                  
                    if ($parents[0])
                    $parents[$key] = $value;
      }
<<<<<<< HEAD
$this->set(compact('parents'));

}
        }
} 
=======
		$this->set(compact('parents'));

	    }
        }
	}  
>>>>>>> 9a68e4b438b5fa86b48466ae879b206e2030f595

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
              }
