document.addEventListener("DOMContentLoaded", function () {
    var customerIDInput = document.getElementById("customerID");
    var searchResults = document.getElementById("searchResults");

    customerIDInput.addEventListener("input", function () {
        var customerID = customerIDInput.value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../Controller/customerSearchProcess.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var responseData = JSON.parse(xhr.responseText);
                displaySearchResults(responseData);
            }
        };

        xhr.send("search=" + encodeURIComponent(customerID));
    });

    function displaySearchResults(data) {
        var table = "<table><tr><th>Customer ID</th><th>Title</th><th>Name</th><th>Date of Birth</th><th>Gender</th><th>Email</th><th>Contact Number</th><th>Country of Residence</th><th>Miles</th><th>Profile Photo</th><th>Nationality</th><th>Passport Number</th><th>Passport Expiry Date</th><th>National ID Number</th><th>Favorite Holiday Preference</th><th>Favorite Destination</th><th>Favorite Airport</th><th>Preferred Seat</th><th>Payment ID</th></tr>";

        for (var i = 0; i < data.length; i++) {
            table += "<tr>";
            table += "<td>" + data[i]['customerID'] + "</td>";
            table += "<td>" + data[i]['title'] + "</td>";
            table += "<td>" + data[i]['firstName'] + " " + data[i]['lastName'] + "</td>";
            table += "<td>" + data[i]['dateOfBirth'] + "</td>";
            table += "<td>" + data[i]['gender'] + "</td>";
            table += "<td>" + data[i]['email'] + "</td>";
            table += "<td>" + data[i]['contactNumber'] + "</td>";
            table += "<td>" + data[i]['countryOfResidence'] + "</td>";
            table += "<td>" + data[i]['miles'] + "</td>";
            table += "<td>" + data[i]['profilePhoto'] + "</td>";
            table += "<td>" + data[i]['nationality'] + "</td>";
            table += "<td>" + data[i]['passportNumber'] + "</td>";
            table += "<td>" + data[i]['passportExpiryDate'] + "</td>";
            table += "<td>" + data[i]['nationalIDNumber'] + "</td>";
            table += "<td>" + data[i]['favoriteHolidayPreference'] + "</td>";
            table += "<td>" + data[i]['favoriteDestination'] + "</td>";
            table += "<td>" + data[i]['favoriteAirport'] + "</td>";
            table += "<td>" + data[i]['preferredSeat'] + "</td>";
            table += "<td>" + data[i]['paymentID'] + "</td>";
            table += "</tr>";
        }

        table += "</table>";
        searchResults.innerHTML = table;
    }

});
