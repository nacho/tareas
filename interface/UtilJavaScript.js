Date.prototype.getWeek = function()
{
	var onejan = new Date(this.getFullYear(),0,1);
	return Math.ceil((((this - onejan) / 86400000) + onejan.getDay()+1)/7);
}

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

var xmlhttp;
var divIdName;

function stateChangedWeekAdded()
{
	if (xmlhttp.readyState == 4)
	{
		var div = document.getElementById('weeks');
		var newdiv = document.createElement('div');
		
		newdiv.setAttribute('id', divIdName);
		newdiv.setAttribute('class', "week");
		newdiv.innerHTML = xmlhttp.responseText;
		div.appendChild(newdiv);
	}
}

function addWeek()
{
	var date = new Date();
	divIdName = date.getWeek()+"-"+date.getFullYear();
	
	if (document.getElementById(divIdName) == null)
	{
		var url = "AddWeek.php";
		url = url + "?q=" + divIdName;
		url = url + "&sid=" + Math.random();
		
		xmlhttp = GetXmlHttpObject();
		if (xmlhttp == null)
		{
			alert ("Your browser does not support XMLHTTP!");
			return;
		}
		xmlhttp.onreadystatechange = stateChangedWeekAdded;
		xmlhttp.open("GET", url, true);
		xmlhttp.send(null);
	}
	else
	{
		var msg = document.getElementById('messages');
		
		msg.innerHTML = "<h1>Week already added</h1>";
	}
}

var taskId;
function stateChangedTaskModified()
{
	if (xmlhttp.readyState == 4)
	{
		var li = document.getElementById(taskId);
		var text = xmlhttp.responseText;
	
		if (text == "User already exists")
		{
			var msg = document.getElementById('messages');
		
			msg.innerHTML = "<h1>"+ text +"</h1>";
		}
		else
		{
			li.innerHTML = text;
		}
	}
}

function taskMade(user, week, task)
{
	taskId = task + week;
	var url = "TaskModified.php";
	
	url = url + "?user=" + user + "&week=" + week + "&task=" + task;
	url = url + "&sid=" + Math.random();
	
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null)
	{
		alert ("Your browser does not support XMLHTTP!");
		return;
	}
	xmlhttp.onreadystatechange = stateChangedTaskModified;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}

function stateChangedAddDebt()
{
	if (xmlhttp.readyState == 4)
	{
		var debts = document.getElementById('debts');
		var newdiv = document.createElement('div');
		
		newdiv.setAttribute('id', "debt");
		newdiv.setAttribute('class', "debt");
		newdiv.innerHTML = xmlhttp.responseText;
		debts.appendChild(newdiv);
	}
}

function addDebt()
{
	var url = "AddDebt.php";
	var user1, user2, amount, description;
	
	user1 = document.getElementById("debtUser1").value;
	user2 = document.getElementById("debtUser2").value;
	description = document.getElementById("debtDescription").value;
	
	amount = eval(document.getElementById("debtAmount").value);
	
	url = url + "?user1=" + user1 + "&user2=" + user2 + "&amount=" + amount + "&desc=" + description;
	url = url + "&sid=" + Math.random();
	
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null)
	{
		alert ("Your browser does not support XMLHTTP!");
		return;
	}
	xmlhttp.onreadystatechange = stateChangedAddDebt;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}

var debtId;

function stateChangedDebtPayed()
{
	if (xmlhttp.readyState == 4)
	{
		var li = document.getElementById(debtId);
		var text = xmlhttp.responseText;
		
		li.setAttribute('class', text);
	}
}

function debtPayed(id)
{
	var url = "DebtPayed.php";
	
	debtId = id;
	
	url = url + "?debtId=" + id;
	url = url + "&sid=" + Math.random();
	
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null)
	{
		alert ("Your browser does not support XMLHTTP!");
		return;
	}
	xmlhttp.onreadystatechange = stateChangedDebtPayed;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}
