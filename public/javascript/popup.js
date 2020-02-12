document.getElementById("create").addEventListener("click", function () {
    document.getElementById("popup").className = "";
    let popup = document.querySelector("#popup>div>div");
    let header = document.querySelector("#popup>div>div");
});

document.getElementById("quit").addEventListener("click", function () {
    document.getElementById("popup").className = "hidden";
});