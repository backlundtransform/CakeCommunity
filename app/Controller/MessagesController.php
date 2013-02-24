<?php
class MessagesController extends AppController {

    public function inbox() {
        $messages = $this->Message->find('all', array(
            'conditions' => array(
                'recipient' => $this->Auth->user('name')
            )

        )

        
        );
        

        $this->set(compact('messages'));
        $newmessage = $this->Message->find('all', array('conditions' => array('recipient' => $this->Auth->user('name'), 'read' => false)));


			return   $newmessage;

    }
    
    public function view($id = null) {

                   $messages = $this->Message->find('all', array(
            'conditions' => array(
                'Message.id' => $id
            )

        )

        
        );
        

        $this->set(compact('messages'));



	$this->Message->updateAll(array('read'=> true ), array('Message.id'=>$id));
    }
    public function outbox() {
        $messages = $this->Message->find('all', array(
            'conditions' => array(
                'sender_id' => $this->Auth->user('id')
            )
        ));
    }

    public function compose() {
        if ($this->request->is('post')) {
            $this->request->data['Message']['sender_id'] = $this->Auth->user('id');


            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Message successfully sent.');
                $this->redirect(array('action' => 'outbox'));
            }

        }

    }
}