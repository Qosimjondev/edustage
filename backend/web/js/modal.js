$('#addcategory').click(function (e){
    e.preventDefault();
    var url =  $(this).attr('href');
    $("#my-modal").modal("show");
    sendData(url);

});

$('body').on('click', '.update-pl-user', function (e){
    e.preventDefault();
    var url =  $(this).attr('href');
    $("#my-modal").modal("show");
    sendData(url);

});

$('body').on('click', '.update-pl-category', function (e){
    e.preventDefault();
    var url =  $(this).attr('href');
    $("#my-modal").modal("show");
    sendData(url);

});




function sendData(_url, formData=null) {
    $.ajax({
            url: _url,
            type: "POST",
            dataType: "json",
            data: formData,
            success: function (mal) {
                    if (mal.status == false)
                    {

                            $("#my-modal").modal('show').find("#modal-content").html(mal.content);
                            $("#modal-save").click(function (e) {
                                    e.preventDefault();
                                    var form = $('#my-form').serialize();
                                    sendData(_url, form);
                                    return false;
                            });

                            return false;
                    }
                    else{
                            $.pjax.reload({container:'#data'});
                            $("#my-modal").modal('hide')
                    }
            },
            error: function (exception) {
                    $("#modal-content").html("<h4>Xatolik yuz</h4>");
            }
    });
}
