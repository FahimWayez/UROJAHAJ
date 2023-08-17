function updateDateTime() {
  const dateTimeElement = document.getElementById("currentDateTime");
  const now = new Date();
  const date = now.toLocaleDateString("en-US", {
    day: "2-digit",
    month: "2-digit",
    year: "numeric",
  });
  const time = now.toLocaleTimeString("en-US", {
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
  });
  dateTimeElement.textContent = `${date}, ${time}`;
}

updateDateTime();

setInterval(updateDateTime, 1000);


//html ba php file er header er bhitore: <div class="time" id = "currentDateTime"></div>
//html ba php file er ekdom niche: <script src="../JS/time.js"></script>
/*css file e: .time {
    position: fixed;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 15px;
    font-weight: bolder;
    white-space: nowrap;
    z-index: 999;
}*/

