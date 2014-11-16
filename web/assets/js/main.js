
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

            // Appply jQuery magic
            $('#slots select').selectmenu({
                width: 400,
            });
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

//Function for remembering the users choict before redirect order page
function price_redirect() {
  $('#bestill1').click(function(){
    localStorage.setItem("redirect", "barn");
  });
  $('#bestill2').click(function(){
    localStorage.setItem("redirect", "herre");
  });
  $('#bestill3').click(function(){
    localStorage.setItem("redirect", "dame");
  });
  $('#bestill4').click(function(){
    localStorage.setItem("redirect", "style");
  });

}

//Function for initializing elements on the order page ( send form etc )
function initialize_order() {
  //if redirect from price:
  if(localStorage.getItem("redirect") != null){
    var cat = localStorage.getItem("redirect");
    switch (cat) {
      case "barn":
        console.log("barn");
        //TODO: Set barn selected
        break;
      case "herre":
        console.log("herre");
        //TODO: Set herre selected
        break;
      case "dame":
        console.log("dame");
        //TODO: Set dame selected
        break;
      case "style":
        console.log("style");
        //TODO: Set style selected
        break;
      default:
        break;
     }
    //Prepopulate select

    localStorage.removeItem("redirect");
  }


  //Submit order
  $('#submit-order').click(function(){
    console.log('form submitted!');

    var date = $('#calendar').val();
    var slot = $('#ui-id-1 option:selected').text();
    var product = $('#product option:selected').text();
    var msg = $('#msg-order').val();

    var XML = '<?xml version="1.0" encoding="UTF-8"?>';
    XML += '<Order>'
    XML += '<dato>' + date + '</dato>';
    XML += '<slot>' + slot + '</slot>';
    XML += '<product>' + product + '</product>';
    XML += '<msg>' + msg  +'</msg>';
    XML += '</Order>';

    //Send xml somewhere
    //var xmlhttp = new XMLHttpRequest();
    //xmlhttp.open("POST","krekle.no:8081/hello",true);
    //xmlhttp.setRequestHeader("Content-type","application/xml");
    //xmlhttp.send(XML);


    // Flash message and redirect user to home.
    $('#submit-wrap').html("Din bestilling er reservert!")
    setTimeout(function(){window.location.replace('index')}, 700);


    console.log(XML);
  });
}

/*
 * jQuery!
 */

$(document).ready(function () {
    // Load map
    load_map();

    // Calendar stuff
    if ($('#calendar').length > 0) {
        // Load the calendar
        load_calendar();

        // Trigger click on the current day
        $('#calendar .ui-state-highlight').trigger('click');

        // Apply jQuery magic to product dropdown
        $('#product').selectmenu({
            width: 400,
        });
    }

    //Price redirect
    price_redirect();

    // Order stuff (bestilling)
    initialize_order();

});
