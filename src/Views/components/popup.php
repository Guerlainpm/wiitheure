<?php
ob_start();
?>
<div id="popup" class="hidden">
    <div class="bg-trdark absolute inset-0 h-screen w-screen flex justify-center items-center">
        <div class="bg-white md:w-64 w-full p-4">
            <div class="flex items-center justify-between px-2">
                <p id="popupTitle"></p>
                <button id="quit" class="w-6 h-6 rounded-full bg-red-500">X</button>
            </div>
            <div class="w-full px-2">
                <form id="popupForm" action="/create/wiit" method="post">
                    <input type="submit" value="sub"/>
                </form>
            </div>
            <div id="footer">
                
            </div>
        </div>
    </div>
</div>