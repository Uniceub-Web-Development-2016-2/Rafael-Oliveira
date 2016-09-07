$(document).ready(function () {
    
    $(".container").css({ "min-height": $(window).height() });
    $("#header").css({ "height": $(window).height() * 0.2 });
       
    
});


$(document).on("click", "#logout", function () {
    logout();
});

function checkLogin() {
    window.location = "html/landing_page.html";

    //var credentials = window.localStorage.getItem("credentials");
    //credentials = JSON.parse(credentials);
    //$.ajax({
    //    type: 'POST',
    //    dataType: 'json',
    //    url: 'http://localhost/alelo/Rafael-Oliveira/index.php/site/login',
    //    data: credentials,
    //    crossDomain: true,
    //    success: function (data, textStatus, jqXHR) {
            
    //        if (data.status) {
    //            window.location = "html/map_tab.html";
    //        } else {

    //            window.location = "html/landing_page.html";
    //        }
    //    }, error: function (jqXHR, textStatus, errorThrown) {
    //        console.log('Ajax error on passing data');
    //    }
    //});
}

function logout() {
   
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'http://savebarkley.org/towels/application/index.php/helper/AppLogout',
        crossDomain: true,
        success: function (data, textStatus, jqXHR) {
            window.location = "landing_page.html";
            
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log('Ajax error on passing data');
        }
    });

}