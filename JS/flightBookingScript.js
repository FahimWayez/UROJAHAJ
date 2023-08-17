document.addEventListener("DOMContentLoaded", function () {
    const flightBookingForm = document.forms['flightBookingForm'];

    flightBookingForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const seatType = flightBookingForm['seatType'].value;
        const customerID = flightBookingForm['customerID'].value;

        if (seatType.trim() === "" || customerID.trim() === "") {
            alert("Please fill all the fields");
            return false;
        }

        flightBookingForm.submit();
    });
});
