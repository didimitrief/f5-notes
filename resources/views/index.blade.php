<div class="main">
    <h1>Список заметок</h1>
    <div class="content" id='content'></div>
    <br>
    <a href="http://127.0.0.1:8000/notes/create" class="create btn">Добавить заметку</a>
</div>
<link href="{{ asset('style.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>

<script>
    $(document).ready(function(){
    $.ajax({
			type: "GET",
			url: 'http://127.0.0.1:8000/api/notes',
			dataType: 'json',
 
			success: function(data){
                console.log(data);
                const content = document.getElementById("content");
                data.forEach(note => {
                    console.log(note);
                    const note_block = document.createElement("div");
                    note_block.className = "block";
                    const note_name = document.createElement("a");
                    note_name.className = "name";
                    note_name.setAttribute('href', `http://127.0.0.1:8000/notes/${note.id}`);

                    const note_delete = document.createElement("button");
                    note_delete.className = "delete btn";
                    // note_delete.setAttribute('href', "http://google.com");
                    note_delete.setAttribute('onclick', `delete_note(${note.id})`);


                    const name = document.createTextNode(note.name);
                    const delete_text = document.createTextNode("Удалить");

                    note_name.appendChild(name);                
                    note_block.appendChild(note_name);

                    note_delete.appendChild(delete_text);
                    note_block.appendChild(note_delete); 

                    content.appendChild(note_block);
                });
			}
		});
    });

    function delete_note(id){
        $.ajax({
            url: `http://127.0.0.1:8000/api/notes/${id}`,
            method: 'delete',
            dataType: 'json',
            contentType: 'application/json',
            success: function () {
                location.reload();
            },
            error: function(){
                alert('Ошибка');
            }
        })
    }

</script>