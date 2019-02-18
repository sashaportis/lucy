// Packages
const $ = require('jquery');
window.$ = window.JQuery =  $;

let init = () => { 
	
}; 

$(document).ready(function() {  
	init();

	fetch('http://localhost:8888/lucyskaer/app/paths.json')
	  .then(function(response) {
	    return response.json();
	  })
	  .then(function(paths) {

	  	

	  	for (var i = paths.length - 1; i >= 0; i--) {
	  		var imgSrc = paths[i].imageURL;
	  		console.log(paths[i]);
	  		$('figure img').each(function(index, el) {
	  			var figureSrc = $(el).attr('src');
	  			if (imgSrc == figureSrc) {
	  				console.log('Match');
	  				$(this).parent().append('<div class="comment">'+ paths[i].imageText +'</div>')
	  			}
	  		});
	  	}
	    // console.log(JSON.stringify(paths));
	  });


});