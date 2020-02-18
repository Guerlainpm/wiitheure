document.getElementById("create").addEventListener("click", function () {
    document.getElementById("popupTitle").innerText = "Wiiter sur l'actualité";
    document.getElementById("popupForm").innerHTML = "";
    document.getElementById("popupForm").innerHTML = "<textarea class=\"rounded resize-none border-2 border-blue-600 \" name='content' id='' cols='10' rows='10' required></textarea> <input type=\"submit\" class=\"w-32 border-2 mt-2 rounded bg-blue-600 text-white px-4 cursor-pointer\" value=\"Wiiter\"/>";
    document.getElementById("popup").className = "";

});

document.getElementById("quit").addEventListener("click", function () {
    document.getElementById("popup").className = "hidden";
});