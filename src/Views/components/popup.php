<?php
ob_start();
?>
<div id="popup" class="hidden">
    <div class="bg-trdark absolute inset-0 h-screen w-screen flex justify-center items-center ">
        <div class="container mx-auto flex justify-center md:p-0 px-4">
        <div class="bg-white p-4 rounded lg:w-1/3 md:w-1/2 w-full">
            <div class="flex items-center justify-between px-2 mb-4">
                <p id="popupTitle" class="border-b-2 border-blue-600"></p>
                <button id="quit" class="text-red-500 w-8 h-8 rounded-full hover:bg-red-500 hover:text-white transition duration-500"><i class="fas fa-times"></i></button>
            </div>
            <div class="h-full w-full px-2">
                <form id="popupForm" action="/create/wiit" method="post" class="w-full flex flex-col justify-between items-left">
                    
                </form>
            </div>

        </div>
    </div>
    </div>
</div>