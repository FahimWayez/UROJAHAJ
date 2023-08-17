document.addEventListener("DOMContentLoaded", function () {
    var flightIDInput = document.getElementById("flightID");
    var searchResults = document.getElementById("searchResults");

    flightIDInput.addEventListener("input", function () {
        var flightID = flightIDInput.value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../Controller/flightSearchProcess.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = JSON.parse(xhr.responseText);
                displaySearchResults(responseData);
            }
        };

        xhr.send("search=" + encodeURIComponent(flightID));
    });

    function displaySearchResults(data) {
        var table = "<table><tr><th>Flight ID</th><th>Fleet</th><th>Economy Class Seats Capacity</th><th>Economy Class Seats Fare</th><th>Business Class Seats Capacity</th><th>Business Class Seats Fare</th><th>Route ID</th><th colspan='2'>Action</th></tr>";

        for (var i = 0; i < data.length; i++) {
            table += "<tr>";
            table += "<td>" + data[i]['flightID'] + "</td>";
            table += "<td>" + data[i]['fleet'] + "</td>";
            table += "<td>" + data[i]['economyClassSeatsCapacity'] + "</td>";
            table += "<td>" + data[i]['economyClassSeatsFare'] + "</td>";
            table += "<td>" + data[i]['businessClassSeatsCapacity'] + "</td>";
            table += "<td>" + data[i]['businessClassSeatsFare'] + "</td>";
            table += "<td>" + data[i]['routeID'] + "</td>";
            table += "<td>" + "<form method='post' action='../Controller/flightDeleteProcess.php'>" + "<input type='hidden' name='flightID' value='" + data[i]['flightID'] + "'>" + "<input class='deleteButton' type='submit' name='deleteFlight' value='Delete Flight'>" + "</form>" + "</td>";
            table += "<td>" + "<form method='post' action='../View/editFlightDetails.php'>" + "<input type='hidden' name='flightID' value='" + data[i]['flightID'] + "'>" + "<input type='hidden' name='fleet' value='" + data[i]['fleet'] + "'>" + "<input type='hidden' name='economyClassSeatsCapacity' value='" + data[i]['economyClassSeatsCapacity'] + "'>" + "<input type='hidden' name='economyClassSeatsFare' value='" + data[i]['economyClassSeatsFare'] + "'>" + "<input type='hidden' name='businessClassSeatsCapacity' value='" + data[i]['businessClassSeatsCapacity'] + "'>" + "<input type='hidden' name='businessClassSeatsFare' value='" + data[i]['businessClassSeatsFare'] + "'>" + "<input type='hidden' name='routeID' value='" + data[i]['routeID'] + "'>" + "<input class='editButton' type='submit' name='updateFlight' value='Edit Flight'>" + "</form>" + "</td>";
            table += "</tr>";
        }
        table += "</table>";
        searchResults.innerHTML = table;
    }
});
