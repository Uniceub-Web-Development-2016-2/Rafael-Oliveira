var map = null;
credentials = 'POdOx7ipuzCweoIEgZ8F~DLMwbnLk8uMv7F92cnaCow~Agx2xUyL8KROQOLsItCAmQUyysSc-KN0rNhcstIrKG1hWUqqA5QV4hoqwZYqC3tz';

var pinInfoBox;  //the pop up info box
var infoboxLayer = new Microsoft.Maps.EntityCollection();
var pinLayer = new Microsoft.Maps.EntityCollection();

function getMap() {

    if (pos == null) {
        setTimeout("getMap()", 1000);
    } else {

       

        map = new Microsoft.Maps.Map(document.getElementById('mapDiv'),
		{
		    credentials: credentials,
		    center: new Microsoft.Maps.Location(42.19833878559011, -71.5644865036),
		    showMapTypeSelector: false,
            showDashboard:false,
		    zoom: 14
		    

		});
    }

}


//type = near or all in selected shelter
function loadPins(method) {
    //console.log(method);
    //in case map hasn't loaded, wait 1 second and try again
    if (map == null) {
        var method = method;

        setTimeout("loadPins('" + method + "')", 2000);
    } else {
        map.entities.clear();
        var load = { pos: pos }
        var load = JSON.stringify(load);

        $.ajax({
            url: 'http://savebarkley.org/towels/application/index.php/User/' + method,
            dataType: 'json',
            type: 'POST',
            data: load,
            success: function (payload, textStatus, jqXHR) {
                console.log(payload);
                var user;
                for(i=0 ; i < 40 ; i++) {
                    var lat = 42.1536426527 + getRandom(-5, 5) / 100;
                    var lng = -71.5644865036 + getRandom(-5, 5) / 100;

                    user = {
                        about: "Lorem cillum dolore eu fugiat nulla pariatur.",
                        address:null,
                        body_message : "<a href=../shelter/index?id=70>Go to Rescuer Page</a>",
                        cover_url : "images/User/57bb4f08cfbb8.png",
                        email : "frythelegend@gmail.com",
                        icon : "../../images/foot-print_20.png",
                        id : "70",
                        lat : lat,
                        lng : lng,
                        name : "Rafael  Oliveira",
                        shelter_id : "72",
                        user_type : "hero",
                        username : "John Silver"

                    }

                    payload.push(user);

                };
                appendPushpins(payload);
                if (method == "GetRescuer") {

                    createDirections(payload[1].lat, payload[1].lng);

                }

            },
            error: function () {
                console.log('err'); // FIXME
            }
        });
    }
}

function appendPushpins(payload) {

    var limit = 50;
    var bounds = map.getBounds();
    latlon = bounds.getNorthwest();
    // Create the info box for the pushpin
    pinInfobox = new Microsoft.Maps.Infobox(new Microsoft.Maps.Location(0, 0), { visible: false });

    infoboxLayer.push(pinInfobox);
    var pushpinArray = Array();
    _.each(payload, function (load, i) {
        //console.log(load.cover_url);
        var pushpin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(load.lat, load.lng), { icon: 94 }, true);
        //var pushpinClick = Microsoft.Maps.Events.addHandler(pushpin, 'mouseover', displayEventInfo);
        var pushpinClick = Microsoft.Maps.Events.addHandler(pushpin, 'click', getPushpinClickEvent);
        
        pushpin.setOptions({ icon: "http://savebarkley.org/towels/application/images/png/" + load.user_type + ".png" });
        pushpin.user = load;
        
        pinLayer.push(pushpin);
        //keep track of the pushpin created for deletion or movementation
        //pushpinArray.push(pushpin);
    });

    map.entities.push(pinLayer);
    map.entities.push(infoboxLayer);
   
}

function displayEventInfo(e) {
    var html = returnInfoBoxHtml(e.target.message);

    pinInfobox.setOptions({
        //title: e.target.name,
        //description: e.target.message,
        visible: true,

        //offset: new Microsoft.Maps.Point(0,25),
        htmlContent: html

    });

    //pinInfobox.setHtmlContent(html);
    pinInfobox.setLocation(e.target.getLocation());
}


function returnInfoBoxHtml(e) {

    var html = '<div class="row infobox-container">';

    html = html + '<div class="col-md-12 infobox-header"><h2>' + e.name + '</h2><a class="infobox_close" href="javascript:closeInfobox()">X</a></div>';

    html = html + '<div class="col-md-12"><img src="http://savebarkley.org/towels/application/' + e.cover_url + '"></div>';

    html = html + '<div class="col-md-12 content"><span>Note: ' + e.body_message + '</span></div>';

    html = html + '</div>';

    return html;
}

// Returns a random number between min (inclusive) and max (exclusive)
function getRandom(min, max) {
    return Math.random() * (max - min) + min;
}

function closeInfobox() {
    pinInfobox.setOptions({ visible: false });
}