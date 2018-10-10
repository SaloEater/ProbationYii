<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\ProducerFilmsSearch;

class ProducerFilmsController extends Controller
{
    /**
     * Displays a single ProducerFilms model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Lists all Films models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProducerFilmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
