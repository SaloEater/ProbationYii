<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 08.11.2018
 * Time: 15:15
 */

namespace bookkeeping\services\auth;

use bookkeeping\forms\manage\user\PasswordResetRequestForm;
use bookkeeping\entities\User;
use bookkeeping\forms\manage\user\ResetPasswordForm;
use bookkeeping\repositories\UserRepository;
use Yii;
use yii\mail\MailerInterface;

class PasswordResetService
{
    private $supportEmail;

    /**
     * @var UserRepository $users
     */
    private $users;

    private $mailer;

    public function __construct($supportEmail, MailerInterface $mailer, UserRepository $users)
    {
        $this->supportEmail = $supportEmail;
        $this->users = $users;
        $this->mailer = $mailer;
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     */
    public function sendEmail(PasswordResetRequestForm $form)
    {
        /* @var $user User */
        $user = $this->users->getActiveByEmail($form->email);

        $this->users->save($user);

        $user->requestResetToken();

        $sent = $this
            ->mailer
            ->compose(
                ['html' => 'reset-html', 'text' => 'reset-text'],
                ['user' => $user]
            )
            ->setFrom($this->supportEmail)
            ->setTo($form->email)
            ->setSubject('Password reset for '.Yii::$app->name)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Mail sending error');
        }
    }

    public function validateToken($token)
    {
        if (empty($token) || !is_string($token)) {
            throw new \DomainException('Password reset token cannot be blank.');
        }
        $userFound = $this->users->existByPasswordResetToken($token);
        if (!$userFound) {
            throw new \DomainException('Wrong password reset token.');
        }
    }

    public function resetPassword(ResetPasswordForm $form, $token)
    {
        /* @var $user User */
        $user = $this->users->getByPasswordResetToken($token);

        $user->resetPassword($form->password);

        $this->users->save($user);
    }
}