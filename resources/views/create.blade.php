<div class="main">
    <a href="http://127.0.0.1:8000/notes/">
        <h1>Создание заметки</h1>
    </a>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>

    <div class="content">
    <label for="name">Создание заметки</label><br>
    <input type="text" id="name" name="name" value="" required><br>
    <br>
    <label for="description">Описание заметки</label><br>
    <input type="text" id="description" name="description" value="" required><br><br>
    <button onclick="save_note()" class="btn create">Сохранить</button>
    </div> 
</div>
<script>
    function save_note(){
        console.log($('#name').val())
        $.ajax({
            url: `http://127.0.0.1:8000/api/notes`,
            contentType: 'application/json',
            type: 'post',
            dataType: 'json',

            data: JSON.stringify({
                 "name": $('#name').val(), "description": $('#description').val(), "done": false
             }),
            success: function (data) {
                // const note = data;
                // $('#name').val(data.name);
                // $('#description').val(data.description);
                window.location.replace("http://127.0.0.1:8000/notes");
            },
            error: function(){
                alert('Ошибка');
            }
        });
    }
    
</script>