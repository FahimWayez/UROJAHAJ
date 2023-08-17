document.addEventListener("DOMContentLoaded", function () {
    const flightSearchForm = document.forms['flightSearchForm'];

    flightSearchForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const boardingPoint = flightSearchForm['boardingPoint'].value;
        const destinationPoint = flightSearchForm['destinationPoint'].value;
        const tripType = flightSearchForm['tripType'].value;
        const dSchedule = flightSearchForm['dSchedule'].value;
        const rDSchedule = flightSearchForm['rDSchedule'].value;

        console.log("Boarding Point:", boardingPoint);
        console.log("Destination Point:", destinationPoint);
        console.log("Trip Type:", tripType);
        console.log("Departure Schedule:", dSchedule);
        console.log("Return Schedule:", rDSchedule);

        if (boardingPoint.trim() === "" || destinationPoint.trim() === "" || tripType === "Trip Type" || dSchedule.trim() === "") {
            alert("Please fill all the fields");
            return false;
        }

        if (tripType === "Return" && rDSchedule.trim() === "") {
            alert("You have chosen the return trip type. Please enter a return date schedule of your liking.")
            return false;
        }

        flightSearchForm.submit();
    });
});
