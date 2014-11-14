
/*
 * Load map in the footer
 */

function load_map() {
    // Set positions
    var officePos = new google.maps.LatLng(60.18577171428199,10.253432506607055);
    
    // Create map with these settings
    var map = new google.maps.Map(document.getElementById("map"),{
        center: officePos,
        zoom: 14,
        streetViewControl: false,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.HYBRID});
    
    // Create marker
    var marker = new google.maps.Marker({
        position: officePos,
        map: map,
        title: 'Gran'
    }); 
}

/*
 * Toggle submenu
 */

function menu_mouseover(e) {
    // Store reference
    var $obj = $(e.target);
    
    // Fire only on li on/out
    if ($obj.prop('tagName').toLowerCase() == 'li') {
        // Check if we should force submenu to stay open
        if ($obj.find('ul').length > 0) {
            // Force open!
            $obj.find('ul').css('display', 'block');
        }
        else {
            // Avoid the submenu
            if (!$obj.parent().hasClass('sub-menu')) {
                // Check if we should close it again
                if ($('.menu > li > ul').css('display') == 'block') {
                    // Closy close
                    $('.menu > li > ul').css('display', 'none');
                }
            }
        }
    }
}
function menu_mouseout() {
    // Close the menu
    $('.menu > li > ul').css('display', 'none');
}

// jQuery gogo
$(document).ready(function () {
    // Load map
    load_map();
    
    // Set mouseover
    $('.menu li').on('mouseover', menu_mouseover);
    $('.menu > li > ul').on('mouseleave', menu_mouseout);
});