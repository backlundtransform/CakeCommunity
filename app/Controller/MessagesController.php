<?php
class MessagesController extends AppController {

    public function inbox() {
$this->ban_check();
        $messages = $this->Message->find('all', array(
            'conditions' => array(
                'recipient' => $this->Auth->user('username')
            )

        )

        
        );
        

        $this->set(compact('messages'));
        $newmessage = $this->Message->find('all', array('conditions' => array('recipient' => $this->Auth->user('name'), 'read' => false)));


			return   $newmessage;

    }
    
    public function view($id = null) {
    	
$this->ban_check();
                   $messages = $this->Message->find('all', array(
            'conditions' => array(
                'Message.id' => $id
            )

        )   );
        

        $this->set(compact('messages'));



	$this->Message->updateAll(array('read'=> true ), array('Message.id'=>$id));

         if ($this->request->is('post')) {
            $this->request->data['Message']['sender_id'] = $this->Auth->user('id');
           


            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Message successfully sent.');
                $this->redirect(array('action' => 'outbox'));
            }

        }
        

    }
    public function outbox() {
 $this->ban_check();
        $messages = $this->Message->find('all', array(
            'conditions' => array(
                'sender_id' => $this->Auth->user('id')
            )
        ));
    }

    public function compose() {
  $this->ban_check();
        if ($this->request->is('post')) {
            $this->request->data['Message']['sender_id'] = $this->Auth->user('id');


            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Message successfully sent.');
                $this->redirect(array('action' => 'outbox'));
            }

        }

    }
	
	
}