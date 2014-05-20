<?php
include "base.php";
$Base = new Base;
$Base->setNewTime();
?>
<script type="text/javascript">
function getXmlHttpRequest()
{
	if (window.XMLHttpRequest) 
	{
		try 
		{
			return new XMLHttpRequest();
		}catch (e){};
	} 
	else if (window.ActiveXObject) 
	{
	   try 
		{
			return new ActiveXObject('Msxml2.XMLHTTP');
		}catch (e){};
		try 
		{
			return new ActiveXObject('Microsoft.XMLHTTP');
		}catch (e){};
	};
	return null;
};
function getCountUsers()
{
    var req = getXmlHttpRequest();
    if(req == null) return;
    req.onreadystatechange = function()
    {
        if(req.readyState == 4)
        {
            document.getElementById("online").innerHTML = req.responseText;
        };
    };
    req.open("POST","online.php",true);
    req.send(null);
    
};
window.onload = function()
{
    getCountUsers();
    setInterval(function(){getCountUsers()},5000);
};
</script>

<p>Количество ONLINE: <span style="color: green;" id="online"></span></p>
<p><input type="button" value="Проверить" onclick="getCountUsers();"></p>

