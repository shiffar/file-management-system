$(document).ready(function(){
    'use strict'
    
    function init_template(){
        // Demo Functions
        var simulateOffline = $('.simulate-offline');
        var simulateOfflinePage = $('.simulate-offline-page');
        var simulateOnline = $('.simulate-online');
        var onlineMessage = $('.online-message');
        var offlineMessage = $('.offline-message');
        var detectedOnline = 'online-message-active';
        var detectedOffline = 'offline-message-active';
        var menuHider = $('.menu-hider');

        simulateOffline.on('click', function(){
            offlineMessage.addClass(detectedOffline);
            onlineMessage.removeClass(detectedOnline);
            setTimeout(function(){
                offlineMessage.removeClass(detectedOffline);
            }, 2000);
        });

        simulateOfflinePage.on('click', function(){
            $('#menu-offline').addClass('menu-active');
            menuHider.addClass('menu-active no-click');
        });

        simulateOnline.on('click', function(){
            onlineMessage.addClass(detectedOnline);
            offlineMessage.removeClass(detectedOffline);
            setTimeout(function(){
                onlineMessage.removeClass(detectedOnline);
            }, 2000);
        });

        if (!$('.offline-message').length){
            $('#page').append('<div data-height="cover" class="caption bottom-0 offline-message"><div class="caption-center"><h1 class="center-text"><i class="fa fa-exclamation-triangle color-red2-dark fa-3x bottom-20"></i></h1><h1 class="color-white center-text fa-5x uppercase bolder bottom-10 top-20">Woops!</h1><h2 class="color-white center-text uppercase bolder top-30 bottom-30 font-15">no internet</h2><p class="boxed-text-large">Please check your internet connection!</p></div><div class="caption-overlay bg-black opacity-80"></div></div>');
            $('#page').append('<p class="online-message bg-green1-dark color-white center-text uppercase ultrabold">You are back online. Welcome!</p>');
        }

        var status = document.getElementById("status");
        var log = document.getElementById("log");
        var onlineMessage = $('.online-message');
        var offlineMessage = $('.offline-message');
        var offlineMenu = $('#menu-offline');
        var detectedMenu = 'menu-active';
        var detectedOnline = 'online-message-active';
        var detectedOffline = 'offline-message-active';

        function updateOnlineStatus(event) {
            var condition = navigator.onLine ? "online" : "offline";
            onlineMessage.addClass(detectedOnline);
            offlineMessage.removeClass(detectedOffline);
            offlineMenu.removeClass(detectedMenu);
            menuHider.removeClass('menu-active no-click');
            setTimeout(function(){
                onlineMessage.removeClass(detectedOnline);
            }, 2000);
        }

        function updateOfflineStatus(event) {
            var condition = navigator.onLine ? "online" : "offline";
            offlineMessage.addClass(detectedOffline);
            offlineMenu.addClass(detectedMenu);
            menuHider.addClass('menu-active no-click');
        }

        window.addEventListener('online', updateOnlineStatus);
        window.addEventListener('offline', updateOfflineStatus);
    }

    // Activating all the plugins
    setTimeout(init_template, 0);
});
