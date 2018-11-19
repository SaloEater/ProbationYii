<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 18.11.2018
 * Time: 9:53
 */

namespace backend\controllers;

use bookkeeping\entities\searchers\FamilySearch;
use bookkeeping\services\manage\bookkeeping\FamilyService;
use bookkeeping\services\manage\UserService;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FamiliesController extends Controller
{

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
                        'actions' => ['index', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FamilySearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Films model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        /**
         * @var UserService $service
         */
        $service = \Yii::$container->get(FamilyService::class);
        $service->remove($id);

        //TODO: Family remove
        return $this->redirect(['index']);
    }

}