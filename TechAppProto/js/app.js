//defined to the store the Google map api object.
var map;

//Array of location objects (with title and location lat lngs).

var locations = [
    {title: "IF1", location: {lat: 9.882474, lng: 78.083635}},
    {title: "IF2", location: {lat: 9.882411, lng: 78.083628}},
    {title: "IF3", location: {lat: 9.882322, lng: 78.083619}},
    {title: "ICT Lab", location: {lat: 9.882541, lng: 78.083736}},
    {title: "Staff Room", location: {lat: 9.882544, lng: 78.083605}},
    {title: "Men's Restroom", location: {lat: 9.882637, lng: 78.083737}},
    {title: "Library", location: {lat: 9.882609, lng: 78.083604}}
];
//key to indicate marker id, not utilized in this app.
//added for future reference.
var i=0;

//item modal to hold the locations.
var Item = function(item) {
  var self = this;
  this.name = item.title;
  this.loc = item.location;
  //defines marker for the location, Map is not set here.
  this.marker = new google.maps.Marker({
    position: self.loc,
    title: self.name,
    id: i++,
    animation: google.maps.Animation.DROP
  });
  //define information window for marker.
  this.LargeInfoWindow = new google.maps.InfoWindow();
  //data retrieved from the Wikipedia API is stored here.
  this.apiContent = "";
  //getContent function retrieves data from API and stores in apiContent.
  this.getContent = function() {
    self.apiContent = "";
    //handle errors from API using Timeout.
    var wikiTimeout = setTimeout(function() {
        self.apiContent = "<li class='api-error'>Can not load wiki articles</li>";}, 8000);
    //format api url with location as query.
    apiURL = "http://en.wikipedia.org/w/api.php?action=opensearch&search=%query%&format=json&callback=wikiCallbackFunction";
    apiURL = apiURL.replace("%query%", self.name);
    var itemFormat = '<li><a href="%itemurl%" target="_blank">%item%</a></li>';
    var item, length;
    //json request
    $.ajax({
        url: apiURL,
        dataType: "jsonp"
    }).done(function(data) {
        length = data[1].length;
        if(0===0) {
          self.apiContent = self.apiContent + "<li>No articles found</li>";
        } else {
        	for(var i = 0; i < length ; i++){
            	item = itemFormat;
            	item = item.replace("%item%", data[1][i]);
            	item = item.replace("%itemurl%", data[3][i]);
	            self.apiContent = self.apiContent + item;
        	}
    	}
        //clear timeout function since API response is OK.
        clearTimeout(wikiTimeout);
    })
    .fail(function(data) {
      //handles errors on wikipedia api response.
      self.apiContent = "<li class='api-error'>Can not load wiki articles</li>";
    });
  };
  //calls getContent function to retrieve data from API.
  this.getContent();
  //define event listener for marker.
  this.marker.addListener('click', function() {
    //opens marker and info window.
    self.openMarker();
  });
  this.populateInfo = function(marker, infowindow) {
    //checks whether infowindow for the marker is already open.
    if(infowindow.marker != marker) {
      infowindow.marker = marker;
      //displays title with API content.
      var desc = "";
      switch(marker.title) {
      	case "IF1":
      	case "IF2":
      	case "IF3": desc ="Class Room"; break;
      	case "Staff Room": desc = "IT department staff room"; break;
      	case "ICT Lab": desc = "Information and Communication Technology Lab"; break;
      }
      infowindow.setContent('<div class="marker-title">' + marker.title + '</div><div>'+desc+'</div>');

      infowindow.open(map, marker);
      //remove marker from infowindow on close.
      infowindow.addListener( 'closeclick', function() {
       infowindow.close();
      });
    }
  };
  //toggles visibility of marker.
  //used in view model search functionality.
  this.setMarkerVisibility = function(visible) {
    if(visible===true)
      self.marker.setMap(map);
    else
      self.marker.setMap(null);
  };
  //opens information window and animates marker.
  this.openMarker = function() {
    self.populateInfo(self.marker, self.LargeInfoWindow);
    self.marker.setAnimation(google.maps.Animation.BOUNCE);
    //animate marker for 2 seconds.
    setTimeout(function() {
      self.marker.setAnimation(null);
    }, 2000);
  };
  //modal definition ends here.
};

var ViewModel = function() {
  var self = this;
  this.items = ko.observableArray();
  //creates new map with the specified (lat, lng) as center.
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 9.882380, lng: 78.083734},
    zoom: 20
  });

  //creates items objects from locations array and stores it in items observable array.
  locations.forEach( function(loc) {
    self.items.push(new Item(loc));
  });
  //observable for search box. 
  this.searchText = ko.observable("");
  //compute subset upon search and store it in resultSet.
  //resultSet is displayed using bindings.
  this.resultSet = ko.computed( function() {
    var searchString = self.searchText().toLowerCase();
    var results = ko.observableArray([]);
    //store the matched items in array.
    self.items().forEach( function(item) {
      if(item.name.toLowerCase().search(searchString) != -1) {
        results().push(item);
        //display markers for matched items.
        item.setMarkerVisibility(true);
      } else {
        //hide markers for unmatched items.
        item.setMarkerVisibility(false);
      }
    });
    return results();
  });
  //ViewModal definition ends here.
};

//toggles sidebar
var toggleSidebar = function() {
  var listBar = $('.list-view');
  listBar.toggle();
};

//launch application upon Google map API callback.
var initMap = function() {
  ko.applyBindings(new ViewModel());
};

//handle errors from Google maps API response.
var handleMapError = function() {
  $('#map').hide();
  $('.map-view').append("<div class='map-error'>Unkown error, try again!</div>");
};

