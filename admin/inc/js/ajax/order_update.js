$('.state').change(function (){
    var state = $(this).attr('value');
    console.log(state);
    var id = $(this).attr('did');
    console.log(id);
    $.ajax({
        method: "POST",
        url: "update.php",
        data: {id: id, name: state},
        success: function (data) {
            $('main').load(location.href + ' main');
        }
    });
});