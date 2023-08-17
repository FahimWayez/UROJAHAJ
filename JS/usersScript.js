    const searchBar = document.querySelector(".search input"),
    searchIcon = document.querySelector(".search button"),
    user_list = document.querySelector(".usersList");

    searchIcon.onclick = ()=>{
    searchBar.classList.toggle("show");
    searchIcon.classList.toggle("active");
    searchBar.focus();
    if(searchBar.classList.contains("active")){
        searchBar.value = "";
        searchBar.classList.remove("active");
    }
    }

    searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Model/searchModel.php?email=<?php echo urlencode($storedEmail); ?>", true);

    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
            let data = xhr.response;
            user_list.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
    }

    setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../Model/usersModel.php?email=" + encodeURIComponent('<?php echo $storedEmail; ?>'), true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
            let data = xhr.response;
            if(!searchBar.classList.contains("active")){
                user_list.innerHTML = data;
            }
            }
        }
    }
    xhr.send();
    }, 500);

