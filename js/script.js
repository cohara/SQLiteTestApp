$( document ).on( "pageinit", function( event ) {
	var panel_html = ''+
'<ul data-role="listview" data-inset="true">'+
    '<li><a href="index.html"> <img src="icons/home.png"/> Home</a></li>'+
	'<li><a href="Intro.html"> <img src="MGC_Icon.png"/> Welcome</a></li>'+
	'<li><a href="ServiceCATs.php"> <img src="icons/localbusiness.jpg"/>Businesses & Services</a></li>'+ 
	'<li><a href="FoodDrink.html"> <img src="icons/food.png"/> Food & Drink</a></li>'+
	'<li><a href="Activities.html"> <img src="icons/Events.png"/> Activities & Events</a></li>'+
	'<li><a href="Leisure.html"> <img src="icons/SportLeisure.png"/> Sports & Leisure</a></li>'+
	'<li><a href="Attractions.php"> <img src="icons/attractions.png"/> Tourist Attractions</a></li>'+
	'<li><a href="Accommodation.php"> <img src="icons/hotel.png"/> Accommodation</a></li>'+

'</ul>';
		
		$('.panelhtml').html(panel_html);
		$('.panelhtml ul[data-role="listview"]').listview();
});

var map;

var QueryString = function () {
  // This function is anonymous, is executed immediately and 
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
        // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = pair[1];
        // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]], pair[1] ];
      query_string[pair[0]] = arr;
        // If third or later entry with this name
    } else {
      query_string[pair[0]].push(pair[1]);
    }
  } 
    return query_string;
} ();
