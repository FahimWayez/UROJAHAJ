document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector("#feedbackTable tbody");

    // Fetch feedback data using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../Controller/getFeedback.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const feedbackData = JSON.parse(xhr.responseText);
            populateTable(feedbackData);
        }
    };
    xhr.send();

    // Populate table with data
    function populateTable(data) {
        tableBody.innerHTML = "";
        data.forEach(function (row) {
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>${row.feedbackID}</td>
                <td>${row.name}</td>
                <td>${row.customerID}</td>
                <td>${row.subject}</td>
                <td>${row.feedbackMessage}</td>
                <td>${row.action}</td>
                <td>
                    <button class="action-button" data-feedbackid="${row.feedbackID}" data-action="Forwarded">Forward</button>
                    <button class="action-button" data-feedbackid="${row.feedbackID}" data-action="Solved">Solve</button>
                    <button class="action-button" data-feedbackid="${row.feedbackID}" data-action="On queue">Queue</button>
                    <button class="action-button" data-feedbackid="${row.feedbackID}" data-action="Rejected">Reject</button>
                </td>
            `;
            tableBody.appendChild(newRow);
        });

        // Attach event listeners to action buttons
        const actionButtons = document.querySelectorAll(".action-button");
        actionButtons.forEach(button => {
            button.addEventListener("click", handleActionButtonClick);
        });
    }

    // Handle action button click
    function handleActionButtonClick(event) {
        const feedbackID = event.target.getAttribute("data-feedbackid");
        const action = event.target.getAttribute("data-action");

        // Update action in the database
        updateActionInDatabase(feedbackID, action);

        // Simulate sending a notification
        sendNotification(feedbackID, action);

        // Update action in the table
        const actionCell = event.target.parentNode.previousElementSibling;
        actionCell.textContent = action;
    }

    // Update action in the database using AJAX
    function updateActionInDatabase(feedbackID, action) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `../Controller/updateAction.php?feedbackID=${feedbackID}&action=${action}`, true);
        xhr.send();
    }

    // Simulate sending a notification
    function sendNotification(feedbackID, action) {
        // Your notification code here
        console.log(`Notification sent for Feedback ID ${feedbackID}: Action ${action}`);
    }
});
