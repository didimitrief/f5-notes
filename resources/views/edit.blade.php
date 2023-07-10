<div class="main">
    <a href="http://127.0.0.1:8000/notes/">
        <h1>Редактирование заметки</h1>
    </a>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>

    <div class="content">
    <label for="name">Название заметки</label><br>
    <input type="text" id="name" name="name" value="" required><br>
    <label for="description">Описание заметки</label><br>
    <textarea  type="text" id="description" name="description" value="" required></textarea><br><br>
    <button onclick="delete_note()" class="btn delete">Удалить</button>
    <button onclick="save_note()" class="btn create">Сохранить</button>
    </div> 
</div>

<script>
    let url = window.location.href.replace('/edit', '');
    let id = url.substring(url.lastIndexOf('/') + 1);
    console.log(id)

    $.ajax({
    url: `http://127.0.0.1:8000/api/notes/${id}`,
    type: "GET",
    dataType: 'json',
    success: function (data) {
        const name = document.getElementById("name");
        name.value = data.name;
        const description = document.getElementById("description");
        description.value = data.description;
    },
    error: function(){
        alert('Ошибка');
    }
    });


    function delete_note(){
        $.ajax({
            url: `http://127.0.0.1:8000/api/notes/${id}`,
            method: 'delete',
            dataType: 'json',
            contentType: 'application/json',
            success: function () {
                window.location.replace("http://127.0.0.1:8000/notes");
            },
            error: function(){
                alert('Ошибка');
            }
        })
    }


    function save_note(){
        console.log($('#name').val())
        $.ajax({
            url: `http://127.0.0.1:8000/api/notes/${id}`,
            contentType: 'application/json',
            type: 'put',
            dataType: 'json',

            data: JSON.stringify({
                 "name": $('#name').val(), "description": $('#description').val(), "done": false
             }),
            success: function (data) {
                const note = data;
                $('#name').val(data.name);
                $('#description').val(data.description);
                // window.location.replace("http://127.0.0.1:8000/notes");
            },
            error: function(){
                alert('Ошибка');
            }
        });
    }
    
</script>