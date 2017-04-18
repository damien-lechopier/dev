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

var node_path = "./node_modules/";

var paths = {
		'node_modules_absolute': '../../../' + node_path,
		'node_modules_relative': node_path,
		'public_assets': 'public/assets/',
		'resources_relative': 'resources/',
};


elixir(function(mix) {
    mix
    
    // #################### STYLESHEETS ####################
    
	   .styles([
				   paths.node_modules_absolute + "bootstrap/dist/css/bootstrap.min.css",
				   paths.node_modules_absolute + "fancybox/dist/css/jquery.fancybox.css",
				  ], 
				  paths.public_assets + "css/front_plugins.css"
			   )   
	    
	   .styles([
	            	 "template.css",
	                 "nav.css",
	                 "pages.css",
	                 
	                 ],   paths.public_assets + "css/front_custom.css")
	    
	    .styles([
				   paths.node_modules_absolute + "bootstrap-daterangepicker/daterangepicker.css",
				   paths.node_modules_absolute + "bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css",
				   paths.node_modules_absolute + "datatables.net-bs/css/dataTables.bootstrap.css",
				   paths.node_modules_absolute + "admin-lte/dist/css/AdminLTE.min.css",
				   paths.node_modules_absolute + "admin-lte/dist/css/skins/skin-blue.min.css",
				  ], 
				  paths.public_assets + "css/admin_plugins.css"
			   )   
	                 
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
	             paths.node_modules_absolute + "bootstrap/dist/js/bootstrap.min.js",
	             // Fancybox
	             paths.node_modules_absolute + "fancybox/dist/js/jquery.fancybox.pack.js",
	                 
	          ],   
	          paths.public_assets + "js/front_plugins.js"
	          )
	       
	    
	   // Custom scripts 
	   .scripts([
	            	"custom.js"
		             ],   
		             paths.public_assets + "js/front_custom.js"
		          )
	       
	// #################### COPY ####################
	       
	   // ---------- Fonts ----------
		       
			// Fontawesome fonts
		    .copy(paths.node_modules_relative + "font-awesome/fonts/", paths.public_assets +  'fonts')  
		    
		    // Ionicons fonts
		    .copy(paths.node_modules_relative + "ionicons/dist/fonts/", paths.public_assets +  'fonts')  
		    
		    // Bootstrap fonts
		    .copy(paths.node_modules_relative + "bootstrap-sass/assets/fonts/bootstrap/", paths.public_assets +  'fonts')  
		       
		    // Project fonts
		    //.copy(paths.resources_relative + "assets/fonts", paths.public_assets +  'fonts')  

		       
		// ---------- Images ----------
		       
		    // Fancybox img
		    .copy(paths.node_modules_relative + "fancybox/dist/img", paths.public_assets +  'img')
		    
		      // Admin LTE img
		    .copy(paths.node_modules_relative + "admin-lte/dist/img/", paths.public_assets +  'img/adminlte')

	       
});