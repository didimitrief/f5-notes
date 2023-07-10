$.ajax({
    url: `http://127.0.0.1:8000/api/notes`,
    method: 'get',
    dataType: 'json',
    success: function (data) {
        const notes = data.response.data;
        notes.forEach(note => {
            wrapper_note_table.append(`
            <a href="http://127.0.0.1:8000/notes/${note.id}/edit"> 
            <div>{{note.name}}</div>
            </a>`);
        });
        alert('Ok');
    }
});

$.ajax({
    url: `http://127.0.0.1:8000/api/notes/${id}`,
    method: 'get',
    dataType: 'json',
    success: function (data) {
        const note = data.response.data;
        $('#name').val(note.name);
        $('#description').val(note.description);
        alert('2');
    }
});

$.ajax({
    url: `http://127.0.0.1:8000/api/notes/${id}`,
    method: 'put',
    dataType: 'json',
    data: JSON.stringify({
        "name": $('#name').val(), "description": $('#description').val(),
    }),
    success: function (data) {
        alert('Заметка обновлена')
        const note = data.response.data;
        $('#name').val(note.name);
        $('#description').val(note.description);
    }
});

$.ajax({
    url: `http://127.0.0.1:8000/api/notes/${id}`,
    method: 'delete',
    dataType: 'json',
    contentType: 'application/json',
    success: function () {
        alert('Заметка удалена');
        $(`.note_wrapper#${id}`).remove();
    }
})





