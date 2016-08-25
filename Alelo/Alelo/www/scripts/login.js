
$(document).on("click", "#login-btn", function () {
    $("#login-modal").modal("show");

});

$(document).on("click", "#submit-login", function () {
    var username = $("#email").val();
    var pass = $("#password").val();
    login(username, pass);
});

function login(username, pass) {
    var payload = { username: username, password: pass , rememberMe: 1};

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'http://localhost/alelo/Rafael-Oliveira/index.php/site/login',
        data: payload,
        crossDomain: true,
        success: function (data, textStatus, jqXHR) {
            if (data.status) {

                window.localStorage.setItem("user", JSON.stringify(data.user));
                window.localStorage.setItem("credentials", JSON.stringify(payload));
                window.location = "html/dashboard.html";
            } else {

                $("#login-error").empty().text(data.message).css("display", "inline");
            }
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log('Ajax error on passing data');
        }
    });

}
