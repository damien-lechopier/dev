jQuery(document).ready(function(){

	toggleSubNavigation();
	changeLanguage();
	activateSearch();

	jQuery('.thumb.text .text').matchHeight();
	jQuery('.thumb-search .image-holder').matchHeight();
	jQuery('.thumb').matchHeight();
	jQuery('.equal-heigt').matchHeight();
	jQuery( '.gallery' ).sliderPro({
		width: '100%',
		height: 393,
		autoplay: false,
		buttons: false,
		imageScaleMode: 'contain',
		thumbnailWidth: 80,
		thumbnailHeight: 80,
		breakpoints: {
			767:{
				thumbnailWidth: 60,
				thumbnailHeight: 60
			}
		}

	});

	if(jQuery('#map').length > 0){
		google.maps.event.addDomListener(window, 'load', init);
		var map;
		function init() {
			var mapOptions = {
				center: new google.maps.LatLng(49.026599,1.537491),
				zoom: 14,
				zoomControl: true,
				zoomControlOptions: {
					style: google.maps.ZoomControlStyle.DEFAULT,
				},
				disableDoubleClickZoom: true,
				mapTypeControl: false,
				scaleControl: true,
				scrollwheel: false,
				panControl: true,
				streetViewControl: false,
				draggable : true,
				overviewMapControl: true,
				overviewMapControlOptions: {
					opened: false,
				},
				mapTypeId: google.maps.MapTypeId.ROADMAP,
			}
			var mapElement = document.getElementById('map');
			var map = new google.maps.Map(mapElement, mapOptions);
			var locations = [
				['Galvatek 9 rue de la Tour Mesnil-Renard 78270 Bonnières-sur-Sei', 'undefined', 'undefined', 'undefined', 'undefined', 49.02443359999999, 1.5694707000000108, 'https://mapbuildr.com/assets/img/markers/default.png']
			];
			for (i = 0; i < locations.length; i++) {
				if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
				if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
				if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
				if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
				if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
				marker = new google.maps.Marker({
					icon: markericon,
					position: new google.maps.LatLng(locations[i][5], locations[i][6]),
					map: map,
					title: locations[i][0],
					desc: description,
					tel: telephone,
					email: email,
					web: web
				});
				link = '';     }

		}
	}


});
jQuery(window).load(function(){ 

});

jQuery(window).resize(function(){

});

function toggleSubNavigation(){
	var subMenu = jQuery('.dropdown-menu > li > ul');

	subMenu.hide();
	
	if(subMenu.length > 0 ) {
        subMenu.siblings('a').addClass('has-submenu');
    }
    jQuery('.has-submenu').on('click', function(x) {
		x.preventDefault();
		jQuery('.has-submenu').next(subMenu).slideUp();
		jQuery(this).next(subMenu).stop().slideToggle();
		x.stopPropagation();
    });

	jQuery('.dropdown').on("click", function () {
		jQuery('.submenu').slideUp()
	})
};

function changeLanguage(){
	jQuery(".dropdown-menu li a").click(function(){
		jQuery(this).parents(".drop-language").find('.dropdown-toggle').html(jQuery(this).text() + ' <span class="icon-select"></span>');
		jQuery(this).parents(".drop-language").find('.dropdown-toggle').val(jQuery(this).data('value'));
	});
};
function activateSearch(){
	jQuery('.thumb-trouvez').on('click', function (z) {
		z.preventDefault();
		jQuery('.thumb-trouvez').removeClass('active');
		jQuery(this).addClass('active');

	});
};

