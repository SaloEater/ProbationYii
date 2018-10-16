<?php

namespace backend\controllers;

use Codeception\Util\Debug;
use common\models\Films;
use common\models\ProducerFilms;
use common\models\Producers;
use common\models\ProducersSearch;
use Yii;
use yii\web\Controller;
use common\models\ProducerFilmsSearch;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class ProducerFilmsController extends Controller
{

    /**
     * Lists all Films models.
     * @return mixed
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->queryParams;

        print_r($params);
        $searchModel = new ProducersSearch();
        if (isset($params['ProducersSearch']) && isset($params['ProducersSearch']['name'])) {
            $searchModel->name = $params['ProducersSearch']['name'];
        }
        $dataProvider = (new ProducerFilmsSearch())->search($params);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProducerFilms model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $info = $this->findModel($id);

        return $this->render('view', [
            'producer' => $info['producer'],
            'films' => $info['films']
        ]);
    }

    /**
     * Finds the Films model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return array the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        /**
         * @var Producers $producer
         */
        $producer = Producers::findOne($id);

        /**
         * @var ProducerFilms[] $films_id
         */
        $films_id = ProducerFilms::findAll(['producer_id' => $id]);

        /**
         * @var Films[] $_films
         */
        $_films = Films::find();

        foreach ($films_id as $film_id) {
            $_films->orFilterWhere([
                'id' => $film_id->film_id
            ]);
        }

        $films= new ActiveDataProvider([
            'query' => $_films,
        ]);

        return [
            'producer' => $producer,
            'films' => $films
        ];
    }

}
