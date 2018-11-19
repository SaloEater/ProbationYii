<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11.11.2018
 * Time: 16:08
 */

namespace frontend\controllers;


use bookkeeping\forms\ContactForm;
use bookkeeping\services\contact\ContactService;
use yii\base\Module;
use yii\web\Controller;
use Yii;

class ContactController extends Controller
{
    /**
     * @var ContactService $contactService
     */
    private $contactService;

    public function __construct(string $id, Module $module, ContactService $contactService, array $config = [])
    {
        $this->contactService = $contactService;
        parent::__construct($id, $module, $config);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $form = new ContactForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->contactService->sendEmail($form);
                Yii::$app->session->setFlash(
                    'success',
                    'Thank you for contacting us. We will respond to you as soon as possible.'
                );
            } catch (\RuntimeException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
                Yii::$app->errorHandler->logException($e);
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $form,
            ]);
        }
    }
}