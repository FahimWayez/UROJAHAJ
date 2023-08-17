
const feedbackForm = document.forms['feedbackForm'];
const nameField = feedbackForm['name'];
const customerIDField = feedbackForm['customerID'];
const subjectField = feedbackForm['subject'];
const feedbackMessageField = feedbackForm['feedbackMessage'];


function validateForm() {
    if (nameField.value === '' || customerIDField.value === '' || subjectField.value === '' || feedbackMessageField.value === '') {
        alert('Please fill out all fields before submitting.');
        return false; // Prevent form submission
    }
    return true;

    feedbackForm.addEventListener('submit', validateForm);
}