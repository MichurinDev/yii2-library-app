<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Book;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $query = Book::find();

        $search = Yii::$app->request->get('search');

        if (!empty($search)) {
            $query->where(['ilike', 'title', $search]);
        }

        $books = $query->all();

        return $this->render('index', [
            'books' => $books,
            'search' => $search,
        ]);
    }
}