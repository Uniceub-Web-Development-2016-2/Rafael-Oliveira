$(document).ready(function () {
    var user = window.localStorage.getItem("user");
    user = JSON.parse(user);
    makeAjax({ user_id: user.id } , "/Reward/GetRewards" , loadRewards);
});

function loadRewards(data) {
    var body_load = _.template($('#tmpl-rewards').text());
    $('#rewards').append(body_load({ data: data }));
}