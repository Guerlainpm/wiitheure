document.getElementById("create").addEventListener("click", function () {
    document.getElementById("popupTitle").innerText = "create a wiit";
    document.getElementById("popupForm").innerHTML = "";
    document.getElementById("popupForm").innerHTML = "<input class=\"w-full border-2 border-gray-500\" name=\"content\" value=\"\"/> <input type=\"submit\" value=\"sub\"/>";
    document.getElementById("popup").className = "";

});

document.getElementById("quit").addEventListener("click", function () {
    document.getElementById("popup").className = "hidden";
});