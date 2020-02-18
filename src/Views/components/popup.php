<?php
ob_start();
?>
<div id="popup" class="hidden">
    <div class="py-64 bg-trdark absolute inset-0 h-screen w-screen flex justify-center items-center ">
        <div class="h-full bg-white w-8/12 p-4">
            <div class="flex items-center justify-between px-2 mb-4">
                <p id="popupTitle" class="border-b-2 border-blue-600"></p>
                <button id="quit" class="w-8 h-8 rounded hover:bg-red-500 hover:text-white transition duration-500">X</button>
            </div>
            <div class="h-full w-full p-12">
                <form id="popupForm" action="/create/wiit" method="post" class="w-full h-full flex flex-col justify-between items-left">
                    
                </form>
            </div>

        </div>
    </div>
</div>