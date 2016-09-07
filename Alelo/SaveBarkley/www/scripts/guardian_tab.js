$(document).ready(function () {
    
    var user = window.localStorage.getItem("user");
    user = JSON.parse(user);
    $("#username").text(user.username);
    
    loadEvents(user.id);
});

function loadEvents(user_id) {
    
    $.ajax({
        url: 'http://localhost/alelo/Rafael-Oliveira/index.php/event/GetEvents',
        dataType: 'json',
        type: 'GET',
        data:{user_id : user_id},
        success: function (data, textStatus, jqXHR) {
            
            var body_load = _.template($('#tmpl-events').text());
            $('#events').append(body_load({ data: data }));


            //$("#total-points").text(data.points);
        },
        error: function () {
            console.log('err'); // FIXME
        }
    });
}

$(document).on("click", "[data-go-to-mission]", function () {
    window.localStorage.setItem("current_mission", $(this).data("go-to-mission"));
    console.log($(this).data("go-to-mission"));
    window.location = "mission_tab.html";
});
