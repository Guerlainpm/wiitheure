document.getElementById("create").addEventListener("click", function () {
    document.getElementById("popupTitle").innerText = "Wiiter sur l'actualitée";
    document.getElementById("popupForm").innerHTML = "";
    document.getElementById("popupForm").innerHTML = "<input class=\"w-full border-2 border-gray-500\" name=\"content\" value=\"\"/> <input type=\"submit\" value=\"Wiiter\"/>";
    document.getElementById("popup").className = "";

});

document.getElementById("quit").addEventListener("click", function () {
    document.getElementById("popup").className = "hidden";
});