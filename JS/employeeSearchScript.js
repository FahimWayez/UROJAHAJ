document.addEventListener("DOMContentLoaded", function () {
    var employeeIDInput = document.getElementById("employeeID");
    var searchResults = document.getElementById("searchResults");

    employeeIDInput.addEventListener("input", function () {
        var employeeID = employeeIDInput.value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../Controller/employeeSearchProcess.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                searchResults.innerHTML = xhr.responseText;
            }
        };

        xhr.send("search=" + encodeURIComponent(employeeID));
    });
});
