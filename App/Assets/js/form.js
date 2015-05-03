( function(){

	function toggleForm(evt){
		var oForm = evt.target.parentNode.parentNode;
		oForm.classList.toggle( "expanded" );
	}

	var oForms = document.querySelectorAll( ".expandable" );
	
	for( var i=0; i <= oForms.length; i++ ){
		oForms[i].addEventListener( "click", toggleForm, false );
	}


} )();
