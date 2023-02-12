$('.del').click(function (){
    var table = $(this).attr('name');
    console.log(table);
    var id = $(this).attr('did');
    console.log(id);
    $.ajax({
        method: "POST",
        url: "delete.php",
        data: {id: id, name: table},
        success: function (data) {
            $('main').load(location.href + ' main');
        }
    });
});