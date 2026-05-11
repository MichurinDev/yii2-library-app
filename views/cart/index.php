<?php

use yii\helpers\Html;

$this->title = 'Корзина';
?>

<h1>🛒 Корзина</h1>

<?php if (empty($items)): ?>

    <p>Корзина пуста</p>

<?php else: ?>

    <?php foreach ($items as $item): ?>

        <div style="margin-bottom: 10px; padding: 10px; border: 1px solid #ddd;">

            <strong>
                <?= Html::encode($item->book->title) ?>
            </strong>

            <div>
                Автор: <?= Html::encode($item->book->author->name) ?>
            </div>

            <div>
                Год: <?= Html::encode($item->book->year) ?>
            </div>

            <br>

            <?= Html::a(
                'Удалить из корзины',
                ['cart/remove', 'id' => $item->book_id],
                ['class' => 'btn btn-danger btn-sm']
            ) ?>

        </div>

    <?php endforeach; ?>

<?php endif; ?>