<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 31.12.2018
 * Time: 14:27
 */

namespace frontend\controllers;

use bookkeeping\forms\manage\bookkeeping\CategoryForm;
use bookkeeping\forms\manage\bookkeeping\TransactionForm;
use bookkeeping\services\manage\bookkeeping\TransactionService;
use yii\base\Module;
use yii\web\controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;
use DateTime;

class TransactionController extends Controller
{

    /**
     * @var TransactionService $transactionService
     */
    private $transactionService;

    public function __construct(string $id, Module $module, TransactionService $transactionService, array $config = [])
    {
        $this->transactionService = $transactionService;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        //'actions' => ['index', 'create', 'new', 'join'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'create' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actionCreate()
    {
        $form = new TransactionForm();
        if (isset(Yii::$app->request->post()['id'])) {
            $_SESSION['catId'] = Yii::$app->request->post()['id'];
        }
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $form->categoryId = $_SESSION['catId'];
                $form->createdAt = time();
                $form->userId = $this->currentUserId();
                $form->date = DateTime::createFromFormat('d/m/Y', $form->date)->getTimestamp();
                $this->transactionService->create($form);
                unset($_SESSION['catId']);

                return $this->redirect('/../../family');
            } catch (\RuntimeException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
                Yii::$app->errorHandler->logException($e);
            }
        }

        return $this->render('create', [
            'form' => $form,
        ]);
    }

    private function currentUserId()
    {
        return Yii::$app->user->id;
    }


}

