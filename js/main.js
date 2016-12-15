/*!
 *
 *  Web Starter Kit
 *  Copyright 2015 Google Inc. All rights reserved.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *    https://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License
 *
 */
/* eslint-env browser */
(function() {
  'use strict';

  // Check to make sure service workers are supported in the current browser,
  // and that the current page is accessed from a secure origin. Using a
  // service worker from an insecure origin will trigger JS console errors. See
  // http://www.chromium.org/Home/chromium-security/prefer-secure-origins-for-powerful-new-features
  

  // Your custom JavaScript goes here

if (document.getElementById('graph')) {  
  var el = document.getElementById('graph'); // get canvas

  var options = {
      percent:  el.getAttribute('data-percent') || 25,
      size: el.getAttribute('data-size') || 115,
      lineWidth: el.getAttribute('data-line') || 15,
      rotate: el.getAttribute('data-rotate') || 0
  }

  var canvas = document.createElement('canvas');

  // text related
  var textContainer = document.createElement('div');
  var total = document.createElement('span');
  var span = document.createElement('span');

  total.textContent = 'TOTAL';
  span.textContent = options.percent + '%';
      
  if (typeof(G_vmlCanvasManager) !== 'undefined') {
      G_vmlCanvasManager.initElement(canvas);
  }

  var ctx = canvas.getContext('2d');
  canvas.width = canvas.height = options.size;

  textContainer.appendChild(total);
  textContainer.appendChild(span);
  el.appendChild(textContainer);
  el.appendChild(canvas);

  ctx.translate(options.size / 2, options.size / 2); // change center
  ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

  //imd = ctx.getImageData(0, 0, 240, 240);
  var radius = (options.size - options.lineWidth) / 2;

  var drawCircle = function(color, lineWidth, percent) {
      percent = Math.min(Math.max(0, percent || 1), 1);
      ctx.beginPath();
      ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
      ctx.strokeStyle = color;
          ctx.lineCap = 'butt'; // butt, round or square
      ctx.lineWidth = lineWidth
      ctx.stroke();
  };

  drawCircle('#e7e7e7', options.lineWidth, 100 / 100);
  drawCircle('#007bb8', options.lineWidth, options.percent / 100);
}

// Handles loading of exam results...
var showLoading = function(){	
	jQuery('#esd-show-exam-results').hide();
	jQuery('#esd-loading-icon').show();
}

var loadExamResults = function(skills){
	var el = jQuery('#esd-breakdown ul.skills');
	var listItem = "";

	skills.forEach(function(skill){
		listItem += '<li>';
			listItem += '<span class="label">'+skill.name+'</span>';
			listItem += '<span class="bar"><svg aria-labelledby="title desc" role="img"><rect width="100%" x="0" y="0"></rect></svg></span>';
			listItem += '<span class="score">'+skill.result+'</span>';
		listItem += '</li>';
	});


	showLoading();

	setTimeout(function(){		
		el.append(listItem);
		jQuery('#esd-loading-icon').hide();
	}, 2000);

	
};

jQuery('#esd-show-exam-results').on('click', function(){
	jQuery.ajax({
	  type:"POST",
	  url: esd_ajax_obj.ajax_url,
	  data: {
	      action: "esd_fetch_skills"
	  },
	  success:function(response){
	  	// console.log(response.data, 'response');
	  	loadExamResults(response.data.skills);
	  },
	  error: function(errorThrown){
	    alert('Unable to process request: ' + errorThrown);
	    console.log(response, 'response');
	  } 

	});
});

})();
