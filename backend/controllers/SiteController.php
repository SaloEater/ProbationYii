<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 18.11.2018
 * Time: 14:19
 */

namespace backend\controllers;


use yii\web\Controller;

class SiteController extends Controller
{
    public function actionError()
    {
        return $this->render('error');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}