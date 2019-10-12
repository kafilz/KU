// JavaScript Document

function changePass(url,target)
{ 			
			var old_password = document.getElementById("old_password").value;
		    var new_password = document.getElementById("new_password").value;
			var conf_password = document.getElementById("conf_password").value;
		    url = url+'&old_password='+old_password+'&new_password='+new_password+'&conf_password='+conf_password+'&checking=true';		 
			  loading(url,target);
			  
}

function update_email(url,target)
{ 
			
			var admin_email = document.getElementById("admin_email").value;
		    url = url+'&admin_email='+admin_email;		 
			  loading(url,target);
			  
}

function pageload(url,target) {
	 
    // native XMLHttpRequest object
    document.getElementById(target).innerHTML = '<BR><BR><BR><BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/ajax-loader.gif" border="0"/><BR><BR><BR><BR><BR><BR><BR><BR><BR>';
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = function() {jahDone(target);};
        req.open("GET", url, true);
        req.send(null);
    // IE/Windows ActiveX version
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            req.onreadystatechange = function() {jahDone(target);};
            req.open("GET", url, true);
            req.send();
        }
    }
}

function loading(url,target){
		
	document.getElementById('change_password').innerHTML = '';
	document.getElementById('update_email').innerHTML = '';
	// native XMLHttpRequest object
   document.getElementById(target).innerHTML = '<img src="./images/ajax-loader11.gif" width="16" height="16" />';
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = function() {jahDone(target);};
        req.open("GET", url, true);
        req.send(null);
    // IE/Windows ActiveX version
    } else if (window.ActiveXObject){
        req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            req.onreadystatechange = function() {jahDone(target);};
            req.open("GET", url, true);
            req.send();
        }
    }
}

function jahDone(target) {
	
	   
	   // only if req is "loaded"
    if (req.readyState == 4) {
		
        // only if "OK"
        if (req.status == 200) {
            				
           document.getElementById(target).innerHTML = req.responseText;
						
        } else {
            document.getElementById(target).innerHTML="error:\n" + req.statusText;
        }
    }
}
   function pageload1(target) 
	{
	  document.getElementById(target).innerHTML = '&nbsp;';
	}
	
	
    function checkedAll (field,field1,form)
	{		
	
			var	checked = document.getElementById(field).checked;
			for (var i =0; i < form.elements.length; i++) 
			{			
				if(form.elements[i].type == 'checkbox' && form.elements[i].name == field1)
				{form.elements[i].checked = checked;}
				
			}
			
      }
	function checkedAll_ch (field,field1,form)
	{		
			for (var i =0; i < form.elements.length; i++) 
			{			
				if(form.elements[i].type == 'checkbox' && form.elements[i].checked == false)
				{document.getElementById(field).checked = false;break;}
			}
    }
	  function bgClr (id){//document.getElementById(id).background="./images/background.jpg";
	  document.getElementById(id+'_h').className="menu11";
	
	  }
	  function bgClr1 (id){document.getElementById(id).background="../images/background.jpg";}
	   function onload1(id){alert("xxx");}
	   
	   function post_value(target,target_push){
		 
document.getElementById(target_push).value = document.getElementById('pass').value;
document.getElementById(target).innerHTML = '';
}
	


function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
	function formvalidation(form)
	{
         
                       var flag = 0;                       
                       for (var i =0; i < form.elements.length; i++) 
			{			
				if(form.elements[i].type == 'checkbox' && form.elements[i].checked == true)
				{
                                  flag = 1;break;

                                }
		                   
			}
                                  if(flag == 0)
		                    {
                                      alert("Please choose atleast one subject");
                                     return false;
                                       

		                    }
                                   else
				   {
				    return true;
			           }
				
		
	}
function PrintElem(elem)
    {
      var mywindow = window.open('', 'PRINT', 'height=800,width=950');

        
        mywindow.document.write('<html><head><title>' + '' + '</title>');
        mywindow.document.write('<style>table,tr,td,th{border-collapse:collapse;border:1px solid black;}</style>');
        mywindow.document.write('<link href="./style/adminmain.css" rel="stylesheet" type="text/css" />');

        mywindow.document.write('</head><body >');
        //mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;

        }
