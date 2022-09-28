$(document).ready(function() {
    $("#main").fadeIn(1000);

    if ($("#citySelect").val() == "Select") {
        $("#citySelect").val("lat=35.0457219&lon=-85.3094883");
    }

    getWeather();

    $("#citySelect").change(function (e) {
        getWeather(e)
    });

    $("#modalLinkOne").click(function (e) {
        e.preventDefault();
        $("#modalOne").attr("style", "display: block");
    });

    $("#modalOne").click(function (e) {
        e.preventDefault();
        $("#modalOne").attr("style", "display: none");
    });

    // TODO Needs refactoring! (Not DRY)
    function getWeather() {
        $.ajax({
            type: "GET",
            url: "https://api.openweathermap.org/data/2.5/weather?" + $("#citySelect").val() + "&appid=KEYGOESHERE&units=imperial",
            dataType: "json",
            success: function (result, status, xhr) {
                var table = $("<table class='textAlignLeft'><tr><th>Weather</th></tr>");

                table.append("<tr><td>City:</td><td>" + result["name"] + "</td></tr>");
                table.append("<tr><td>Country:</td><td>" + result["sys"]["country"] + "</td></tr>");
                table.append("<tr><td>Temperature:</td><td>" + result["main"]["temp"] + "°</td></tr>");
                table.append("<tr><td>Humidity:</td><td>" + result["main"]["humidity"] + "</td></tr>");
                table.append("<tr><td>Conditions:</td><td>" + result["weather"][0]["description"] + "</td></tr>");

                $("#weather").html(table);
            },
            error: function (xhr, status, error) {
                alert("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
            }
        });
    }
});