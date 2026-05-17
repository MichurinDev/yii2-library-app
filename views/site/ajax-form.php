<?php

$this->title = 'AJAX Form';
?>

<h1>AJAX запросы</h1>

<button id="check-book" class="btn btn-primary">
    Проверить наличие
</button>

<button id="check-discount" class="btn btn-warning">
    Проверить скидку
</button>

<button id="create-order" class="btn btn-success">
    Оформить заказ
</button>

<hr>

<div id="output"></div>

<script>

document.getElementById('check-book').onclick = function () {

    fetch('/index.php?r=ajax/check-book')
        .then(response => response.json())
        .then(data => {

            document.getElementById('output').innerHTML =
                data.message;
        });
};

document.getElementById('check-discount').onclick = function () {

    fetch('/index.php?r=ajax/check-discount')
        .then(response => response.json())
        .then(data => {

            document.getElementById('output').innerHTML =
                data.message;
        });
};

document.getElementById('create-order').onclick = function () {

    fetch('/index.php?r=ajax/create-order')
        .then(response => response.json())
        .then(data => {

            document.getElementById('output').innerHTML =
                data.message;
        });
};

</script>