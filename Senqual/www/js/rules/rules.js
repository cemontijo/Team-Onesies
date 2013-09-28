

function durationSelect(sel){
	var leftBound = document.getElementsByName('left');
	var rightBound = document.getElementsByName('right');
	var selected = sel.selectedIndex;
	
	if(selected == 1){
	//Global
		for(var i = 0; i < leftBound.length; i++) {
			leftBound[i].disabled = true;
			rightBound[i].disabled = true;
		}

	} else if(selected == 2){
	//Before R
		for(var i = 0; i < leftBound.length; i++) {
			leftBound[i].disabled = true;
			rightBound[i].disabled = false;
		}
	} else if(selected == 3){
	//After L
		for(var i = 0; i < leftBound.length; i++) {
			leftBound[i].disabled = false;
			rightBound[i].disabled = true;
		}
	} else{
	//default
		for(var i = 0; i < leftBound.length; i++) {
			leftBound[i].disabled = false;
			rightBound[i].disabled = false;
		}
	}
}

function definitionSelect(sel){
	var premise = document.getElementsByName('premise');
	var selected = sel.selectedIndex;
	
	if(selected == 1 || selected == 2 || selected == 3){
		for(var i = 0; i < premise.length; i++) {
			premise[i].disabled = true;
		}
	} else{
		for(var i = 0; i < premise.length; i++) {
			premise[i].disabled = false;
		}
	}
}