<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Favorites;

class FavoritesController extends Controller
{
    public function actionIndex()
    {
        $items = Favorites::find()->with('book')->all();

        return $this->render('index', [
            'items' => $items
        ]);
    }

    public function actionRemove($id)
    {
        \app\models\Favorites::deleteAll(['book_id' => $id]);

        return $this->redirect(['index']);
    }
}