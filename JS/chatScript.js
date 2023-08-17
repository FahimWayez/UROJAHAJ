const form = document.querySelector(".typingArea");
const receiverID = form.querySelector(".receiverID").value;
const inputField = form.querySelector(".inputField");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chatBox");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

function addMessageToChatBox(messageContent, isOutgoing) {
    const chat = document.createElement("div");
    chat.classList.add("chat");
    chat.innerHTML = `<p>${messageContent}</p>`;

    if (isOutgoing) {
        chat.classList.add("outgoingMessage");
    } else {
        chat.classList.add("incomingMessage");
    }

    chatBox.appendChild(chat);
    scrollToBottom();
}

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Model/insertChat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
                sendBtn.classList.remove("active");
                addMessageToChatBox(xhr.responseText, true);
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
};

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

function getChatMessages() {
    let receiverID = form.querySelector(".receiverID").value; // Get the latest receiverID
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Model/getChat.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.responseText;
            chatBox.innerHTML = data; // Update the chatBox with the fetched messages directly
            scrollToBottom(); // Scroll to the bottom after adding new messages
        }
    };
    xhr.send("receiverID=" + receiverID);
}


function getUsersList() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../Model/usersModel.php?email=" + encodeURIComponent('<?php echo $storedEmail;?>'), true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                user_list.innerHTML = data;
            }
        }
    }
    xhr.send();
}

getChatMessages();
getUsersList();
setInterval(getChatMessages, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
  