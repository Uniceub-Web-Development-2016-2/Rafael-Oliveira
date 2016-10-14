
$(document).on("click", "#login-btn", function () {
    $("#login-modal").modal("show");
    
});

$(document).on("click", "#submit-login", function () {
    var username = $("#username").val();
    var pass = $("#password").val();
    makeAjax({ username: username, password: pass } , "/site/login" , successLogin);
});

function successLogin(data){
    if (data != null) {
                
        window.localStorage.setItem("user", JSON.stringify(data.user));
          
        window.location = "guardian_tab.html";
    } else {
                
        $("#login-error").empty().text(data.message).css("display" , "inline");
    }
    

}

