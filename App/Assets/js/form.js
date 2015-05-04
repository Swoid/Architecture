( function(){

	var aTextInputs = document.querySelectorAll( ".expandable" );
	var i = 0, element;
	for( ; element = aTextInputs[ i++ ] ; ){
		element.addEventListener( "click", expand, false );
	}

	function expand(evt){
		var oForm = evt.target.parentNode.parentNode;
		oForm.className = "expandable expanded";
	}

} )();