var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
process.env.DISABLE_NOTIFIER = true;

var paths = {
		'node_modules_absolute': '../../../node_modules/',
		'node_modules_relative': 'node_modules/',
		'resources_relative': 'resources/',
		'public': 'public/',
		'public_assets': 'public/assets/',
		'resources_vendor_absolute': '../vendor/'
};

/*
elixir(function(mix) {
    mix.sass('app.scss', paths.public_assets + "css/customsass.css");
});
*/

elixir(function(mix) {
    mix
    
    // #################### STYLESHEETS ####################
    
	   .styles([paths.node_modules_absolute + "bootstrap/dist/css/bootstrap.min.css"], paths.public_assets + "css/bootstrap.css")   
	    
	   .styles([
	            	"slider-pro.css",
	                 "template.css",
	                 "nav.css",
	                 "pages.css"
	                 
	                 ],   paths.public_assets + "css/all.css")
	        
	   .styles([paths.node_modules_absolute + "fancybox/dist/css/jquery.fancybox.css"], paths.public_assets + "css/fancybox.css")   
	      
        
    // #################### SCRIPTS ####################
        
	   .scripts([
	             // JQuery
	             paths.node_modules_absolute + "jquery/dist/jquery.min.js",
	             // JQuery migrate
	             paths.node_modules_absolute + "jquery-migrate/dist/jquery-migrate.min.js",
	             // JQuery UI
	             // Désactivé car provoque une erreur avec Jquery
	             //paths.node_modules_absolute + "jquery-ui/jquery-ui.js",
	             // JQuery easing
	             paths.node_modules_absolute + "jquery.easing/jquery.easing.min.js",
	             // Bootstrap
	             paths.node_modules_absolute + "bootstrap/dist/js/bootstrap.min.js"
	             // Modernizr
	             //paths.node_modules_absolute + "modernizr/bin/modernizr"
	                 
	          ],   paths.public_assets + "js/all.js")
	       
	   // fancybox
	   .scripts([paths.node_modules_absolute + "fancybox/dist/js/jquery.fancybox.pack.js"], paths.public_assets + "js/fancybox.js")
	       
	   // Gsap
	   // .scripts([paths.node_modules_absolute + "gsap/src/minified/TweenMax.min.js"], paths.public_assets + "js/gsap.js") 
	       
	   // Scrollmagic
	   //.scripts([
	   //          paths.node_modules_absolute + "scrollmagic/scrollmagic/minified/ScrollMagic.min.js",
	   //          paths.node_modules_absolute + "scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js",
	   //          paths.node_modules_absolute + "scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"
	   //          ], paths.public_assets + "js/scrollmagic.js")
		   
	   // Custom scripts 
	   .scripts([
	             	"matchHeight.js",
	            	 "jquery.sliderPro.min.js",
	            	 "custom.js"
		             ],   paths.public_assets + "js/custom.js")
	       
	// #################### COPY ####################
	       
	   // ---------- Fonts ----------
		       
			// Bootstrap fonts
		    .copy(paths.node_modules_relative + "bootstrap/dist/fonts", paths.public_assets +  'fonts')  
		       
		    // Project fonts
		    .copy(paths.resources_relative + "assets/fonts", paths.public_assets +  'fonts')  

		       
		// ---------- Images ----------
		       
		    // Fancybox img
		    .copy(paths.node_modules_relative + "fancybox/dist/img", paths.public_assets +  'img')

		    
		    
	// #################### EADMIN COMPONENTS #################### 
	       
});