<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Каталог книг';

?>

<h1>Каталог книг</h1>

<?php $form = ActiveForm::begin([
    'method' => 'get',
]); ?>

<?= Html::textInput(
    'search',
    $search,
    [
        'class' => 'form-control',
        'placeholder' => 'Введите название книги'
    ]
) ?>

<br>

<?= Html::submitButton(
    'Поиск',
    ['class' => 'btn btn-primary']
) ?>

<?php ActiveForm::end(); ?>

<hr>

<?php foreach ($books as $book): ?>

    <div class="card p-3 mb-3">

        <h3>
            <?= Html::encode($book->title) ?>
        </h3>

        <p>
            Автор:
            <?= Html::encode($book->author->name) ?>
        </p>

        <p>
            Год:
            <?= Html::encode($book->year) ?>
        </p>

    </div>

<?php endforeach; ?>