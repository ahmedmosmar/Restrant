window.onload = function () {
    'use strict';

    // ===== Start js for Side Menu ======

    // ==== get Element ====
    let toggelMenu = document.getElementById('toggel-menu'),
        sideMenu = document.getElementById('main-menu'),
        mainContent = document.getElementById('main-content');

    // ===== toggle to hile and show side menu ====
    toggelMenu.onclick = function () {
        sideMenu.classList.toggle('hide');
        if (sideMenu.classList.contains('hide')) {
            mainContent.classList.remove('col-md-10');
            mainContent.classList.remove('col-sm-10');
            mainContent.classList.remove('col-xs-10');
            mainContent.classList.add('col-md-12');
            mainContent.classList.add('col-sm-12');
            mainContent.classList.add('col-xs-12');
        } else {
            sideMenu.classList.add('show');
            mainContent.classList.remove('col-md-12');
            mainContent.classList.remove('col-sm-12');
            mainContent.classList.remove('col-xs-12');
            mainContent.classList.add('col-md-10');
            mainContent.classList.add('col-sm-10');
            mainContent.classList.add('col-xs-10');


        }
    }

    // ===== End js for Side Menu ======

}
