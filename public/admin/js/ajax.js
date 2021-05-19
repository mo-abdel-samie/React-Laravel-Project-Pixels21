$(function(){
    $("#ajaxForm").on('submit',function(e){
        e.preventDefault();

        $.each($(".ajax"), function(key) {
            console.log(key);
            $("#" + key + "_error").text('');
        });

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            cache: false,
            beforesend:function (){
            },
            success: function (data) {
                if (data.status == true) {
                    $('#success_msg').show();
                    $('#danger_msg').hide();
                }
            }, error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
                $('#danger_msg').show();
                $('#success_msg').hide();
            }
        });
    });
});
