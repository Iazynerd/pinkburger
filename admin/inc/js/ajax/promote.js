$('.promote').click(function (){
    var id = $(this).attr('id');
    console.log(id);
    $.ajax({
        method: "POST",
        url: "team.php",
        data: {id: id},
        success: function (data) {
            $('main').load(location.href + ' main');
        }
    });
});