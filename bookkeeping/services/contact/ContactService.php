<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 09.11.2018
 * Time: 20:37
 */

namespace bookkeeping\services\contact;

use bookkeeping\forms\ContactForm;
use Yii;
use yii\db\Exception;

class ContactService
{

    private $supportEmail;
    private $adminEmail;

    public function __construct($supportEmail, $adminEmail)
    {
        $this->supportEmail = $supportEmail;
        $this->adminEmail = $adminEmail;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     */
    public function sendEmail(ContactForm $form)
    {

        $sent = Yii::$app->mailer->compose()
            ->setTo($this->adminEmail)
            ->setFrom($this->supportEmail)
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Mail sending error');
        }
    }
}