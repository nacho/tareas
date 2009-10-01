function GetXmlHttpObject()
{
	var xmlhttp = null;
	
	if (window.XMLHttpRequest)
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	return xmlhttp;
}

function getTask()
{
	return "<button type='button'>Task1</button>"+
	       "<button type='button'>Task2</button>"+
	       "<button type='button'>Task3</button>"+
	       "<button type='button'>Task4</button>";
}

function addWeek()
{
	var div = document.getElementById('weeks');
	var newdiv = document.createElement('div');
	var date = new Date();
	var divIdName = date.getDate()+"-"+date.getMonth() + 1+"-"+date.getFullYear();
	
	if (document.getElementById(divIdName) == null)
	{
		newdiv.setAttribute('id', divIdName);
		newdiv.innerHTML = getTask();
		div.appendChild(newdiv);
	}
	else
	{
		var msg = document.getElementById('messages');
		
		msg.innerHTML = "<h1>Ya esta anhadida la semana</h1>";
	}
}
