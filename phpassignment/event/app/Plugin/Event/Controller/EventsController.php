<?php
App::uses('EventAppController', 'Event.Controller');
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 5/21/12
 * Time: 1:06 PM
 * To change this template use File | Settings | File Templates.
 */
class EventsController extends EventAppController {

   // public $scaffold = 'admin';

/*
/**
 * index method
 *
 * @return void
 */
    var $components = array('SwiftMailer');

    public function index() {
        $this->Event->recursive = 0;
        $this->set('events', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id/home/webonise/Projects/first/app/Plugin/Event/Controller
     * @return void
     */
    public function view($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('event', $this->Event->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            //print_r($this->request->data);die;
            if ($this->Event->save($this->request->data)) {

                $alldata=$this->request->data['Event']['email'];

                $alldata_arr=explode(",",$alldata);

                $count=count($alldata_arr);

                // pr($this->Event->find('all',array('fields'=>array('Event.guest_invited'))));die;
                for($i=0;$i<$count;$i++){

                    $msg=$this->send_mail($alldata_arr[$i]);

                    if($msg==1){
                       // $this->Event->saveField('guest_invited',$alldata_arr[$i]);
                        $this->Session->setFlash(__('email sent'));
                    }
                }

                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
    }
    public function edit($id = null) {
        $this->Event->id = $id;

        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Event->read(null, $id);

        }
    }
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('Event deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Event was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    public function invite($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid Event'));
        }

        $this->set('event', $this->Event->read(null, $id));

        /*if ($this->request->is('post') || $this->request->is('put')) {
           $alldata=$this->request->data['Event']['email'];
            $alldata_arr=explode(",",$alldata);

            $count=count($alldata_arr);
            $this->Event->saveField('guest_invited',$count);
         // pr($this->Event->find('all',array('fields'=>array('Event.guest_invited'))));die;
            for($i=0;$i<$count;$i++){
                  $msg=$this->send_mail($alldata_arr[$i]);
                    if($msg==1){
                        $this->Session->setFlash(__('email sent'));
                    }
            }
        } else {
            $this->request->data = $this->Event->read(null, $id);

        }*/
    }

    private function send_mail($data){

        $str_template_data="hello";
        $returnarray=array();
        $returnarray['html']='html';
        $returnarray['from']='reshma@weboniselab.com';
        $returnarray['fromName']='reshma@weboniselab.com';
        $returnarray['to']=$data;
        $returnarray['toName']='Invitation for event';
        $returnarray['subject']='Invitation for event';

        if($this->send_SMTP_mail($returnarray, $str_template_data)){

            return 1;
        }
        //set variables to template as usual
        //  $swift->set('message', 'My message');
    //    $this->SwiftMailer->send('invite', 'My subject');

    }


}