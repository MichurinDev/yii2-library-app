<?php

$this->title = 'AJAX Search';
?>

<h1>AJAX поиск книг</h1>

<input
    type="text"
    id="search"
    class="form-control"
    placeholder="Введите название книги"
/>

<br>

<div id="results"></div>

<script>

document.getElementById('search').addEventListener('keyup', function () {

    let query = this.value;

    fetch('/index.php?r=search/ajax&q=' + query)
        .then(response => response.json())
        .then(data => {

            let html = '';

            data.forEach(book => {

                html += `
                    <div style="padding:10px;border:1px solid #ccc;margin-bottom:10px;">
                        <strong>${book.title}</strong>
                        <div>Год: ${book.year}</div>
                    </div>
                `;
            });

            document.getElementById('results').innerHTML = html;
        });
});

</script>