<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Cart;

class CartController extends Controller
{
    public function actionIndex()
    {
        $items = Cart::find()->with('book')->all();

        return $this->render('index', [
            'items' => $items
        ]);
    }

    public function actionRemove($id)
    {
        \app\models\Cart::deleteAll(['book_id' => $id]);

        return $this->redirect(['index']);
    }
}