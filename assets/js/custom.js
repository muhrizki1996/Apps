/* Edit Item */
$("body").on("click",".edit",function(){

    var id = $(this).parent("td").data('id');
    var stbid = $(this).parent("td").prev("td").prev("td").text();
    var username = $(this).parent("td").prev("td").text();
    var password = $(this).parent("td").prev("td").text();
    var type = $(this).parent("td").prev("td").text();
    var total_all_channel = $(this).parent("td").prev("td").text();
    var channel_active = $(this).parent("td").prev("td").text();
    var status = $(this).parent("td").prev("td").text();

    $("#edit").find("input[name='stbid']").val(stbid);
    $("#edit").find("textarea[name='username']").val(username);
    $("#edit").find("textarea[name='password']").val(password);
    $("#edit").find("textarea[name='type']").val(type);
    $("#edit").find("textarea[name='total_all_channel']").val(total_all_channel);
    $("#edit").find("textarea[name='channel_active']").val(channel_active);
    $("#edit").find("textarea[name='status']").val(status);
    $("#edit").find("form").attr("action",url + '/edit/' + id);

});