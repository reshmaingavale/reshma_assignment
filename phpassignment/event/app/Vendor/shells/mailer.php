<?php // File -> app/vendors/shells/mailer.php

class MailerShell extends Shell {
    var $tasks = array('SwiftMailer');

    function mail() {
        $this->out("Executing Mail command");
        $this->SwiftMailer->instance->smtpType = 'tls';
        $this->SwiftMailer->instance->smtpHost = 'smtp.gmail.com';
        $this->SwiftMailer->instance->smtpPort = 465;
        $this->SwiftMailer->instance->smtpUsername = 'reshma@weboniselab.com';
        $this->SwiftMailer->instance->smtpPassword = 'nicegirl';

        $this->SwiftMailer->instance->sendAs = 'html';
        $this->SwiftMailer->instance->from = 'reshma@weboniselab.com';
        $this->SwiftMailer->instance->fromName = 'TEST';
        $this->SwiftMailer->instance->to = array(
            'my_email@gmail.com' => 'recepient 1',
            'receiver@bad-domain.org' => 'recepient 2'
        );

        $this->SwiftMailer->set('message', 'Smack my mailer shell');
        $this->SwiftMailer->instance->registerPlugin('LoggerPlugin', new Swift_Plugins_Loggers_EchoLogger());

        try {
            if(!$this->SwiftMailer->instance->send('im_excited', 'My subject')) {
                foreach($this->SwiftMailer->instance->postErrors as $failed_send_to) {
                    $this->log("Failed to send email to: $failed_send_to");
                    $this->out("Failed to send email to: $failed_send_to");
                }
            }
        }
        catch(Exception $e) {
            $this->log("Failed to send email: ".$e->getMessage());
            $this->out("Failed to send email: ".$e->getMessage());
        }
        $this->out("Finished Mail command");
    }
}
?> 