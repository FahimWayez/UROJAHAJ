document.addEventListener("DOMContentLoaded", function () {
    var routeIDInput = document.getElementById("routeID");
    var searchResults = document.getElementById("searchResults");

    routeIDInput.addEventListener("input", function () {
        var routeID = routeIDInput.value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../Controller/routeSearchProcess.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = JSON.parse(xhr.responseText);
                displaySearchResults(responseData);
            }
        };

        xhr.send("search=" + encodeURIComponent(routeID));
    });

    function displaySearchResults(data) {
        var table = "<table><tr><th>Route ID</th><th>Boarding Point</th><th>Boarding Airport</th><th>Destination Point</th><th>Destination Airport</th><th>Trip Type</th><th>Schedule Date</th><th>Schedule Time</th><th>Return Schedule Date</th><th>Return Schedule Time</th><th colspan='2'>Action</th></tr>";

        for (var i = 0; i < data.length; i++) {
            table += "<tr>";
            table += "<td>" + data[i]['routeID'] + "</td>";
            table += "<td>" + data[i]['boardingPoint'] + "</td>";
            table += "<td>" + data[i]['boardingAirport'] + "</td>";
            table += "<td>" + data[i]['destinationPoint'] + "</td>";
            table += "<td>" + data[i]['destinationAirport'] + "</td>";
            table += "<td>" + data[i]['tripType'] + "</td>";
            table += "<td>" + data[i]['dSchedule'] + "</td>";
            table += "<td>" + data[i]['tSchedule'] + "</td>";
            table += "<td>" + data[i]['rDSchedule'] + "</td>";
            table += "<td>" + data[i]['rTSchedule'] + "</td>";
            table += "<td>" + "<form method='post' action='../Controller/routeDeleteProcess.php'>" + "<input type='hidden' name='routeID' value='" + data[i]['routeID'] + "'>" + "<input class='deleteButton' type='submit' name='deleteRoute' value='Delete Route'>" + "</form>" + "</td>";
            table += "<td>" + "<form method='post' action='../View/editRouteDetails.php'>" + "<input type='hidden' name='routeID' value='" + data[i]['routeID'] + "'>" + "<input type='hidden' name='boardingPoint' value='" + data[i]['boardingPoint'] + "'>" + "<input type='hidden' name='boardingAirport' value='" + data[i]['boardingAirport'] + "'>" + "<input type='hidden' name='destinationPoint' value='" + data[i]['destinationPoint'] + "'>" + "<input type='hidden' name='destinationAirport' value='" + data[i]['destinationAirport'] + "'>" + "<input type='hidden' name='tripType' value='" + data[i]['tripType'] + "'>" + "<input type='hidden' name='dSchedule' value='" + data[i]['dSchedule'] + "'>" + "<input type='hidden' name='tSchedule' value='" + data[i]['tSchedule'] + "'>" + "<input type='hidden' name='rDSchedule' value='" + data[i]['rDSchedule'] + "<input type='hidden' name='rTSchedule' value='" + data[i]['rTSchedule'] + "'>" + "<input class='editButton' type='submit' name='updateRoute' value='Edit Route'>" + "</form>" + "</td>";
            table += "</tr>";
        }
        table += "</table>";
        searchResults.innerHTML = table;
    }
});
