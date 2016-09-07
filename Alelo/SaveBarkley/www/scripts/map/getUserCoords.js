var pos = null;
//looks for default location in the DB
function getDefaultLocation() {

    $.ajax({
        url: "http://savebarkley.org/towels/application/index.php/User/GetLocation",
        dataType: "json",
        type: "GET",
        success: function (data, textStatus, jqXHR) {
            pos = data;
            console.log(pos);
        },
        error: function () {
            alert("Something went wrong, please try again later!");
        }

    });

}

function getCurrentLocation() {
    
    navigator.geolocation.getCurrentPosition(onSuccess, onError);

}

// onSuccess Callback
// This method accepts a Position object, which contains the
// current GPS coordinates
//
var onSuccess = function (position) {
    pos = { lat: position.coords.latitude, lng: position.coords.longitude };
};

// onError Callback receives a PositionError object
//
function onError(error) {
    alert('code: ' + error.code + '\n' +
          'message: ' + error.message + '\n');
}

