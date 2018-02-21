
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Remove alert messages after a few seconds
$(document).ready(function(){
    setTimeout(function() {
        $(".alert").fadeOut('fast')
    }, 3000);
});





