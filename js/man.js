
var pass;
var sub=0;

function valid1()
{
	if(!name1())
	{
		name1();
	}
	if(!check1())
	{	check1()}
	if(!confirm1())
		{confirm1();}
	
	if(!ans1())
		{ans1();}
}
function valid2()
{
	if(!mobile())
	{
		mobile();
	}
	
	
	
}

// password validation 
	function check1()
	{
		var c=document.forms["signup"]["password"].value;
		if(c.length < 6 )
		{
			
			document.getElementById("ps").innerHTML="<br/><font color=red>Password must contain UpperCase, LowerCase, Number/SpecialChar and min 6 Characters</font>";
			return false;
		}
		else
		{
			document.getElementById("ps").innerHTML="";
			pass=c;
			return true;
			//sub++;
			//valid1();
		//	alert(sub);
		}
	}
// confirm password
	function confirm1()
	{
		var c=document.forms["signup"]["confirm_password"].value;
		//alert(c);
		if(c!=pass)
		{
			document.getElementById("cps").innerHTML="<br/><font color=red>Passwords did not match </font>";
			return false;
		}
		else
		{
			document.getElementById("cps").innerHTML="";
			//sub++;
			return true;
			//valid1();
			//alert(sub);
		}
	}
	
//validation for name	
	function name1()
	{	
		var c=document.forms["signup"]["Username"].value;
		//alert(c);
		//var letters = /^[A-Za-z]+$/; 
		var charat=c.charAt(0);
		//alert(""+charat);
		
		 if( charat < 65 || charat > 91 || charat <97 || charat>123 )
		 {
			document.getElementById("fn").innerHTML="<br/><font color=red>Username must not empty or start with number.</font>";
			return false;
		 }
		else if(c.length < 5 )
		{
			document.getElementById("fn").innerHTML="<br/><font color=red>Username must be atleast 5 - 32 char long</font>";
			return false;
		}
		
		else 
		{
			document.getElementById("fn").innerHTML="";
			sub++;
			//valid1();
			return true;
			//alert("ninm;l");
		}
	}
	
	
// mobile number validation	
	function mobile()
	{
		var nn=document.forms["signup"]["phone1"].value;
		var n1=parseInt(nn);
		var r=nn.charAt(0)-0;
		//alert(r);
		var flag=0,flag1=0;
		
		if(nn.length==10)
		{
			flag=1;
		}
		//alert(n1);
		if(nn!=n1 || r<7)
		{
			document.getElementById("mn").innerHTML="<br/><font color=red>Mobile No. is not valid</font>";
			return false;
		}
	//	alert(n1.length);
		else if(flag!=1)
		{
			document.getElementById("mn").innerHTML="<br/><font color=red>Mobile No. must be 10 digit</font>";
			return false;
		}
		else if(flag==1)
		{
			document.getElementById("mn").innerHTML="";
			return true;
			//sub++;
			//valid1();
			//alert(sub);
		}
		
	}
	
// validation for answer of security question
	function ans1()
	{
		var c=document.forms["signup"]["secAns"].value;
		//alert(c.length);
		if(c.length < 1 )
		{
			document.getElementById("an").innerHTML="<br/><font color=red>Enter the answer</font>";
			return false;
		}
		else
		{
			document.getElementById("an").innerHTML="";
			return true;
			//sub++;
			//valid1();
			//alert(sub);
		}
	}
	
	function nestop()
	{
		var c=document.getElementById("marq");
		//alert(c);
		c.stop();
	}
	
	
	function nestrt()
	{
		var c=document.getElementById("marq");
		//alert(c);
		c.start();
	}
	
// find train selection of option
	function clicker()
	{
		var c=document.getElementById("myselect");
		var n=c.selectedIndex;
		//alert(n);
		if(n==0)
		{	document.getElementById("mbox").innerHTML="From ";
			document.getElementById("xbox").style.display="";
			document.getElementById("xbox1").style.display="";
		}
		
		if(n==1)
		{	document.getElementById("mbox").innerHTML="Train Name ";
			document.getElementById("xbox").style.display="none";
			document.getElementById("xbox1").style.display="none";
			document.getElementById("xbox1").value="";
		}
		if(n==2)
		{
			document.getElementById("mbox").innerHTML="Train Number";
			document.getElementById("xbox").style.display="none";
			document.getElementById("xbox1").style.display="none";
			document.getElementById("xbox1").value="";
		}
		
	}