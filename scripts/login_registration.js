// JavaScript Document

function changePass(url,target)
{ 			
			var old_password = document.getElementById("old_password").value;
		    var new_password = document.getElementById("new_password").value;
			var conf_password = document.getElementById("conf_password").value;
		    url = url+'&old_password='+old_password+'&new_password='+new_password+'&conf_password='+conf_password+'&checking=true';		 
			  loading(url,target);
			  
}
function makeEditable(url,target)
{ 			

		    var password = document.getElementById("password").value;

		    url = url+'&password='+password+'&checking=true';
		 
			  loading(url,target);
			  
}
function getusername(url,target)
{ 			
			
	
		  var stud_identity = document.getElementById("stud_identity").value;
		  var dob           = document.getElementById("dob").value;
                  var str   = stud_identity;
		  var str1  = dob;
                  var n = str.length;
		 var n1 = str1.length;
                 if(n1 == 10){
		  url = url+'&stud_identity='+stud_identity+'&dob='+dob+'&checking=true';
	
         	 
		  pageload(url,target);
                  }
			  
}

function update_email(url,target)
{ 
			
			var admin_email = document.getElementById("admin_email").value;
		    url = url+'&admin_email='+admin_email;		 
			  loading(url,target);
			  
}

function pageload(url,target) {
	 
    // native XMLHttpRequest object
    document.getElementById(target).innerHTML = '<img src="./images/ajax-loader11.gif" width="16" height="16" />';
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

	document.getElementById(target).innerHTML = '';
	//document.getElementById('update_email').innerHTML = '';
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
           

             if(req.responseText == "#*")
             {
                       window.location.href = 'user_reg_form.php';	

			
             }
             else
             {
            	 document.getElementById(target).innerHTML = req.responseText;                 	
				
               
            }
						
        } else {
            document.getElementById(target).innerHTML="error:\n" + req.responseText;
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
 
	function formvalidation(form,sub1,hons)
	{
                
          	if(hons=='1' && sub1!='COMH' && sub1!='BBAH' && sub1!='BBAT' && sub1!='BCAH'){            
 			if(document.getElementById("generic").value == '')
			{
                                     alert("Please select GENERIC ELECTIVE");
                                     return false;
                                       
			}
		}

                        if(document.getElementById("mil").value == '')
			{
                                     alert("Please select AECC ELECTIVE (MIL)");
                                     return false;
                                       
			}
                       
                      
		
	}
	function formvalidation1(form)
	{
                         

		  var stud_identity     = document.getElementById("stud_identity").value;
		  var stream        	= document.getElementById("stream").value;
		  var is_hons       	= document.getElementById("is_hons").value;
		  var main_subject  	= document.getElementById("main_subject").value;
		  var s_name        	= document.getElementById("s_name").value;
		  var sex           	= document.getElementById("sex").value;
		  var category      	= document.getElementById("category").value;
		  var ph            	= document.getElementById("ph").value;
		  var ph_type           = document.getElementById("ph_type").value;
		  var religion      	= document.getElementById("religion").value;
		  var date_of_birth 	= document.getElementById("date_of_birth").value;
		  var date_of_admission = document.getElementById("date_of_admission").value;
		  var f_name        	= document.getElementById("f_name").value;
		  var m_name       	= document.getElementById("m_name").value;
		  var mob_no        	= document.getElementById("mob_no").value;
		  var comm_add1       	= document.getElementById("comm_add1").value;
		  var comm_pin        	= document.getElementById("comm_pin").value;
		  var perm_add1       	= document.getElementById("perm_add1").value;
		  var perm_pin        	= document.getElementById("perm_pin").value;

		  
			if(stud_identity == '')
			{
                                     alert("Please enter student ID");
                                     return false;
                                       
			}	               
			else if(stream == '')
			{
                                     alert("Please select course name");
                                     return false;
                                       
			}
			else if(is_hons == '')
			{
                                     alert("Please select course type");
                                     return false;
                                       
			}
			else if(main_subject == '')
			{
                                     alert("Please select Hons/Prog/B.ED Subject");
                                     return false;
                                       
			}
			else if(s_name == '')
			{
                                     alert("Please enter your name");
                                     return false;
                                       
			}
			else if(sex == '')
			{
                                     alert("Please select gender");
                                     return false;
                                       
			}
			else if(category == '')
			{
                                     alert("Please select category");
                                     return false;
                                       
			}
			else if(ph == '')
			{
                                     alert("Please select differently abled value yes/no");
                                     return false;
                                       
			}
			else if(ph == 'Y' && ph_type == '')
			{
                                     alert("Please select differently abled type");
                                     return false;
                                       
			}
			else if(religion == '')
			{
                                     alert("Please enter your religion");
                                     return false;
                                       
			}
			else if(date_of_birth == '')
			{
                                     alert("Please enter your date of birth");
                                     return false;
                                       
			}
			else if(date_of_admission == '')
			{
                                     alert("Please enter your date of admission");
                                     return false;
                                       
			}
			else if(f_name == '')
			{
                                     alert("Please enter your father name");
                                     return false;
                                       
			}
			else if(m_name == '')
			{
                                     alert("Please enter your mother name");
                                     return false;
                                       
			}
			else if(mob_no == '')
			{
                                     alert("Please enter your mobile no");
                                     return false;
                                       
			}
			else if(comm_add1 == '')
			{
                                     alert("Please enter communication address line1 value");
                                     return false;
                                       
			}
			else if(comm_pin == '')
			{
                                     alert("Please enter communication pin");
                                     return false;
                                       
			}
			else if(perm_add1 == '')
			{
                                     alert("Please enter permanent address line1 value");
                                     return false;
                                       
			}
			else if(perm_pin == '')
			{
                                     alert("Please enter permanent pin");
                                     return false;
                                       
			}

                     if(confirm('Are you sure you want to submit?Review your data thoroughly')) {return true; }
		                   
                     else{    return false; }

	}
function formvalidation2(form)
	{
                         

		  var stream        	= document.getElementById("stream").value;
		  var is_hons       	= document.getElementById("is_hons").value;
		  var main_subject  	= document.getElementById("main_subject").value;
		  var s_name        	= document.getElementById("s_name").value;
		  var sex           	= document.getElementById("sex").value;
		  var category      	= document.getElementById("category").value;		
		  var ph            	= document.getElementById("ph").value;
		  var ph_type           = document.getElementById("ph_type").value;
		  var religion      	= document.getElementById("religion").value;
		  var date_of_birth 	= document.getElementById("date_of_birth").value;
		  var date_of_admission = document.getElementById("date_of_admission").value;
		  var f_name        	= document.getElementById("f_name").value;
		  var m_name       	= document.getElementById("m_name").value;
		  var mob_no        	= document.getElementById("mob_no").value;
		  var comm_add1       	= document.getElementById("comm_add1").value;
		  var comm_pin        	= document.getElementById("comm_pin").value;
		  var perm_add1       	= document.getElementById("perm_add1").value;
		  var perm_pin        	= document.getElementById("perm_pin").value;

		  
	                if(stream == '')
			{
                                     alert("Please select course name");
                                     return false;
                                       
			}
			else if(is_hons == '')
			{
                                     alert("Please select course type");
                                     return false;
                                       
			}
			else if(main_subject == '')
			{
                                     alert("Please select Hons/Prog/B.Ed Subject");
                                     return false;
                                       
			}
			else if(s_name == '')
			{
                                     alert("Please enter your name");
                                     return false;
                                       
			}
			else if(sex == '')
			{
                                     alert("Please select gender");
                                     return false;
                                       
			}
			else if(category == '')
			{
                                     alert("Please select category");
                                     return false;
                                       
			}
			else if(ph == '')
			{
                                     alert("Please select differently abled value yes/no");
                                     return false;
                                       
			}
			else if(ph == 'Y' && ph_type == '')
			{
                                     alert("Please select differently abled type");
                                     return false;
                                       
			}
			else if(religion == '')
			{
                                     alert("Please enter your religion");
                                     return false;
                                       
			}
			else if(date_of_birth == '')
			{
                                     alert("Please enter your date of birth");
                                     return false;
                                       
			}
			else if(date_of_admission == '')
			{
                                     alert("Please enter your date of admission");
                                     return false;

                                       
			}
			else if(f_name == '')
			{
                                     alert("Please enter your father name");
                                     return false;
                                       
			}
			else if(m_name == '')
			{
                                     alert("Please enter your mother name");
                                     return false;
                                       
			}
			else if(mob_no == '')
			{
                                     alert("Please enter your mobile no");
                                     return false;
                                       
			}
			else if(comm_add1 == '')
			{
                                     alert("Please enter communication address line1 value");
                                     return false;
                                       
			}
			else if(comm_pin == '')
			{
                                     alert("Please enter communication pin");
                                     return false;
                                       
			}
			else if(perm_add1 == '')
			{
                                     alert("Please enter permanent address line1 value");
                                     return false;
                                       
			}
			else if(perm_pin == '')
			{
                                     alert("Please enter permanent pin");
                                     return false;
                                       
			}

                     if(confirm('Are you sure you want to submit?Review your data thoroughly')) {return true; }
		                   
                     else{    return false; }

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
