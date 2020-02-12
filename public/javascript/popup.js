document.getElementById("create").addEventListener("click", function () {
    document.getElementById("popupTitle").innerText = "create a wiit";
    document.getElementById("popupForm").innerHTML = "<input class=\"w-full border-2 border-gray-500\" name=\"content\" value=\"\"/>" + document.getElementById("popupForm").innerHTML;
    document.getElementById("popup").className = "";

});

document.getElementById("quit").addEventListener("click", function () {
    document.getElementById("popup").className = "hidden";
});