<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11.11.2018
 * Time: 16:19
 */

namespace frontend\controllers\auth;

use bookkeeping\forms\manage\user\PasswordResetRequestForm;
use bookkeeping\forms\manage\user\ResetPasswordForm;
use bookkeeping\services\auth\PasswordResetService;
use Yii;
use yii\base\Module;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class PasswordResetController extends Controller
{


    /**
     * @var PasswordResetService $passwordResetService
     */
    private $passwordResetService;

    public function __construct(
        string $id,
        Module $module,
        PasswordResetService $passwordResetService,
        array $config = []
    ) {
        $this->$passwordResetService = $passwordResetService;
        parent::__construct($id, $module, $config);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequest()
    {
        $form = new PasswordResetRequestForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->passwordResetService->sendEmail($form);
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
                Yii::$app->errorHandler->logException($e);
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $form,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionReset($token)
    {
        $form = new ResetPasswordForm();

        try {
            $this->passwordResetService->validateToken($token);
        } catch (\DomainException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->passwordResetService->resetPassword($form, $token);
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
                Yii::$app->errorHandler->logException($e);
            }

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $form,
        ]);
    }
}