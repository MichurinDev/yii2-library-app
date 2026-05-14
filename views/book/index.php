<?php

use app\models\Book;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin'): ?>

            <?= Html::a(
                'Create Book',
                ['create'],
                ['class' => 'btn btn-success']
            ) ?>

        <?php endif; ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'year',

            [
                'attribute' => 'author_id',
                'value' => 'author.name',
            ],

            // Рейтинг (кнопки 1–5)
            [
                'label' => 'Rating',
                'format' => 'raw',
                'value' => function ($model) {

                    $html = '';

                    for ($i = 1; $i <= 5; $i++) {

                        $html .= Html::a(
                            "⭐ $i ",
                            Url::to([
                                'book/rate',
                                'id' => $model->id,
                                'value' => $i
                            ])
                        );
                    }

                    return $html;
                }
            ],

            // Избранное
            [
                'label' => 'Favorite',
                'format' => 'raw',
                'value' => function ($model) {

                    return Html::a(
                        '❤️ Add',
                        Url::to([
                            'book/favorite',
                            'id' => $model->id
                        ]),
                        ['class' => 'btn btn-outline-danger btn-sm']
                    );
                }
            ],

            // Корзина
            [
                'label' => 'Cart',
                'format' => 'raw',
                'value' => function ($model) {

                    return Html::a(
                        '🛒 Add',
                        Url::to([
                            'book/cart',
                            'id' => $model->id
                        ]),
                        ['class' => 'btn btn-outline-primary btn-sm']
                    );
                }
            ],

            [
                'class' => ActionColumn::className(),

                'visibleButtons' => [

                    'update' => function () {
                        return !Yii::$app->user->isGuest
                            && Yii::$app->user->identity->role === 'admin';
                    },

                    'delete' => function () {
                        return !Yii::$app->user->isGuest
                            && Yii::$app->user->identity->role === 'admin';
                    },
                ],

                'urlCreator' => function ($action, Book $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>