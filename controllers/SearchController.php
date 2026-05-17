<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Book;

class SearchController extends Controller
{
    public function actionAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $query = Yii::$app->request->get('q');

        $books = Book::find()
            ->where(['like', 'title', $query])
            ->all();

        $result = [];

        foreach ($books as $book) {
            $result[] = [
                'title' => $book->title,
                'year' => $book->year,
            ];
        }

        return $result;
    }
}