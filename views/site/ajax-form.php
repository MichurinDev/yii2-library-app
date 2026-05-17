<?php

$this->title = 'AJAX Order';
?>

<h1>AJAX оформление заказа</h1>

<div class="mb-3">

    <label class="form-label">
        Название книги
    </label>

    <input
        type="text"
        id="book-title"
        class="form-control"
        placeholder="Введите название книги"
    >
</div>

<div class="mb-3">

    <button id="check-book" class="btn btn-primary">
        Проверить наличие
    </button>

    <button id="check-discount" class="btn btn-warning">
        Проверить скидку
    </button>

    <button id="create-order" class="btn btn-success">
        Оформить заказ
    </button>

</div>

<hr>

<div id="output"></div>

<script>

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute('content');

function showMessage(message) {

    document.getElementById('output').innerHTML =
        '<div class="alert alert-info">' +
        message +
        '</div>';
}

// Проверка книги
document.getElementById('check-book').onclick = function () {

    let title = document.getElementById('book-title').value;

    fetch('/index.php?r=ajax/check-book', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-Token': csrfToken
        },

        body: 'title=' + encodeURIComponent(title)

    })
    .then(response => response.json())
    .then(data => {

        showMessage(data.message);
    });
};

// Проверка скидки
document.getElementById('check-discount').onclick = function () {

    fetch('/index.php?r=ajax/check-discount', {

        method: 'POST',

        headers: {
            'X-CSRF-Token': csrfToken
        }

    })
    .then(response => response.json())
    .then(data => {

        showMessage(data.message);
    });
};

// Оформление заказа
document.getElementById('create-order').onclick = function () {

    let title = document.getElementById('book-title').value;

    fetch('/index.php?r=ajax/create-order', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-Token': csrfToken
        },

        body: 'title=' + encodeURIComponent(title)

    })
    .then(response => response.json())
    .then(data => {

        showMessage(data.message);
    });
};

</script>