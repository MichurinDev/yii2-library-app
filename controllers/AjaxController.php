<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class AjaxController extends Controller
{
    public function actionCheckBook()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'message' => 'Книга доступна'
        ];
    }

    public function actionCheckDiscount()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'message' => 'Скидка 15%'
        ];
    }

    public function actionCreateOrder()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'message' => 'Заказ успешно оформлен'
        ];
    }
}