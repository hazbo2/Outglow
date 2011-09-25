
/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	var myObj = false;
				
	if(window.XMLHttpRequest)
	{
					
		myObj = new XMLHttpRequest();
					
	} else if(window.ActiveXObject)
	{
		myObj = new ActiveXObject("Microsoft.XMLHTTP");
	}
	function requestData(dataSource, targetDiv)
	{
		var target = document.getElementById(targetDiv);		
		myObj.open("GET", '../../libs/og_com/omod_index.php?type=' + dataSource + "&trace=_OJAX");		
		myObj.onreadystatechange = function()
		{
			if(myObj.readyState == 4 && myObj.status == 200)
			{
				target.innerHTML = myObj.responseText;
			}	
		}
		
		myObj.send(null);	
	}
	function getElement(newElement)
	{
		var myElement = doucment.getElementById(newElement);
		return myElement;
	}
	function getThenPlace(content, targetDiv)
	{
		var target = document.getElementById(targetDiv);
		target.innerHTML = content;
	}
	function inputValue(inputId)
	{
		var input = document.getElementById(inputId);
		return input.value;
	}