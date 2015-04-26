( function(){

	var aPopupButtons = document.querySelectorAll( ".popup-button" );
	var i = 0, element;
	for( ; element = aPopupButtons[ i++ ] ; ){
		element.addEventListener( "click", togglePopup, false );
	}

	document.addEventListener( "click", checkParent, false );

	function checkParent(event){
		var hasParent = false;
	    for(var node = event.target; node != document.body; node = node.parentNode)
	    {
	      if( node.className == 'messages' || node.className == 'notifications' || node.className == 'search search-primary' || node.className == 'search search-secondary' || node.className == 'footer' ){
	        hasParent = true;
	        break;
	      }
	    }
	  if(!hasParent){
	    var popup = document.querySelector( ".show" );
		popup.className = "popup";
	  }
	}

	function togglePopup(evt){
		var oPopup = evt.target.nextElementSibling;
		oPopup.classList.toggle( "show" );
	}

} )();

