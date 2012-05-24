<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {

    public $component = array('SwiftMailer');

    function send_SMTP_mail($data = array(), $messageData = null) {

        $this->SwiftMailer->from = $data['from'];
        $this->SwiftMailer->fromName = $data['fromName'];
        $this->SwiftMailer->to = $data['to'];
        $this->SwiftMailer->toName = $data['toName'];
        $this->SwiftMailer->subject = $data['subject'];
        //$this->SwiftMailer->setBody('Here is the message itself')
        $this->SwiftMailer->controller->set(compact('messageData'));

        if ($data['from'] == null) {

            return false;
        } elseif ($data['to'] == null) {


            return false;
        } elseif ($data['subject'] == null) {


            return false;
        } elseif (!$this->SwiftMailer->send('default', $data['subject'])) {


            $this->log('Error sending email "$template".', LOG_ERROR);

            return false;
        } else {

            return true;
        }
    }
}
