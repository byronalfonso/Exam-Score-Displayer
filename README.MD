##Development Dependencies:
1. Npm.
2. Gulp.
3. Google Web Starter Kit.
4. PHP and Wordpress.

##Installation:
1. Download the zip file.
2. Extract and copy to your wp-content/plugins dir.

##Development: 
The front end was developed using Google Web Starter Kit to take advantage of it's built in tools. Then after, started reading articles and tutorials to review how to make a plugin in Wordpress. I've also reviewed some of the core concepts like Action/Filter hooks, Custom post types, shortcodes, wp_ajax action etc... After getting enough info, I started by creating a metabox and custom field and making it save on the db. Then after I continued working on implementing the frontend using shortcodes. After I'm done with the shortcode, I've worked towards making the wp_ajax call work. The idea is to populate the view with dynamic data using wp_ajax. After successfully implement the wp_ajax, I worked on refactoring and cleaning the code. Added some minor dynamic data on the front-end like the status and percentage value. Then I've also made sure that the responsiveness of the view will work not only with the screen size but also with parent element widths.

##Disclaimer:
Though this is an already functional plugin, it is however, not a fully completed plugin in yet. There are still things that can be added or improved upon. Like Animation of the graphs, Conversion of the whole data set to dynamic custom fields.

##Notes:
1. Added validation on the skill result.
	- checks if the entered value is numeric or not.
	- checks if the entered value is less than 0 or greater than 100.
2. Although a validation was set for skill result, error message has not been researched and added to it yet.
