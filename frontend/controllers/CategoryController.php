<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 19.11.2018
 * Time: 11:07
 */

namespace frontend\controllers;

use Yii;
use bookkeeping\forms\manage\bookkeeping\CategoryForm;
use bookkeeping\services\manage\bookkeeping\CategoryService;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Cookie;

class CategoryController extends Controller
{

    private $categoryService;
    private $createCached = [];

    public function __construct(string $id, Module $module, CategoryService $categoryService, array $config = [])
    {
        $this->categoryService = $categoryService;
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

    public function actionCreate()
    {
        $form = new CategoryForm();
        if (isset(Yii::$app->request->post()['familyId']) &&
            isset(Yii::$app->request->post()['parentId'])) {
            $_SESSION['familyId'] = Yii::$app->request->post()['familyId'];
            $_SESSION['parentId'] = Yii::$app->request->post()['parentId'];
        }
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $form->familyId = $_SESSION['familyId'];
                $form->parentId = $_SESSION['parentId'];
                $form->createdBy = $this->currentUserId();
                $form->createdAt = time();
                $this->categoryService->create($form);
                unset($_SESSION['familyId']);
                unset($_SESSION['parentId']);

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