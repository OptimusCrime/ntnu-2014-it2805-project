
/*
 * Load map in the footer
 */

function load_map() {
    // Set positions
    var office_pos = new google.maps.LatLng(63.4330834, 10.3919029);

    // Create map with these settings
    var map = new google.maps.Map(document.getElementById("map"),{
        center: office_pos,
        zoom: 15,
        streetViewControl: false,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.HYBRID});

    // Create marker
    var marker = new google.maps.Marker({
        position: office_pos,
        map: map,
        title: 'IKT-Frisør'
    });
}

/*
 * Calendar stuff
 */

var calculated_days = {};
function load_calendar() {
    $('#calendar').datepicker({
        firstDay: 1,
        dayNamesMin: [
            'Sø', 'Ma', 'Ti', 'On', 'To', 'Fr', 'Lø',
        ],
        onSelect: function(day) {
            // "Calculate" random available slots
            if (!calculated_days.hasOwnProperty(day)) {
                // Temp array to keep the available slots in
                var temp_arr = [];
                
                // We only work from 10:00 - 16:00 #layz
                for (var i = 10; i <= 16; i++) {
                    // Actually this produces 1:2 chance, but whatever
                    if ((Math.floor(Math.random() * 10) + 1) <= 5) {
                        // Yay, add this slot
                        temp_arr.push(i);
                    }
                }
                
                // Add
                calculated_days[day] = temp_arr;
            }
            
            // Display slots
            load_available(calculated_days[day]);
        },
    });
}
function load_available(arr) {
    // Check if anything is available
    if (arr.length == 0) {
        $('#slots').html('<p>Det er visst ingen tilgjengelige timer denne dagen!');
    }
    else {
        var str = '';
        for (var i = 0; i < arr.length; i++) {
            str += '<option value="' + arr[i] + '">' + arr[i] + ':00</option>';
        }
        
        $('#slots').html('<select>' + str + '</select');
    }
}


/*
 * jQuery!
 */

$(document).ready(function () {
    // Load map
    load_map();
    
    // Caldnar stuff
    if ($('#calendar').length > 0) {
        // Load the calendar
        load_calendar();
        
        // Trigger click on the current day
        $('#calendar .ui-state-highlight').trigger('click');
    }
});