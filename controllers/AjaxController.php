<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Book;

class AjaxController extends Controller
{
    // Проверка наличия книги
    public function actionCheckBook()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $title = Yii::$app->request->post('title');

        $book = Book::find()
            ->where(['like', 'title', $title])
            ->one();

        if ($book) {

            return [
                'success' => true,
                'message' => 'Книга найдена: ' . $book->title
            ];
        }

        return [
            'success' => false,
            'message' => 'Книга не найдена'
        ];
    }

    // Проверка скидки
    public function actionCheckDiscount()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $discount = rand(5, 30);

        return [
            'success' => true,
            'message' => 'Доступна скидка ' . $discount . '%'
        ];
    }

    // Оформление заказа
    public function actionCreateOrder()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $title = Yii::$app->request->post('title');

        if (!$title) {

            return [
                'success' => false,
                'message' => 'Введите название книги'
            ];
        }

        return [
            'success' => true,
            'message' => 'Заказ на книгу "' . $title . '" успешно оформлен'
        ];
    }
}