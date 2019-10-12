// JavaScript Document

function sendPassword(id,target)
{ 

	if(confirm('Are you sure you want to resend password')) {
		var url = 'resend_password.php?id='+id+'&checking=true';
		loading(url,target);		

		}		                   
                else{    return false; }
			
		      
}
function changeMobno(url,target)
{ 			

		    var mob_no = document.getElementById("mob_no").value;

		    url = url+'&mob_no='+mob_no+'&checking=true';		 
			  loading(url,target);
			  
}
function getusername(url,target)
{ 			
			
	
		  var reg_no = document.getElementById("reg_no").value;
		//alert(reg_no);
		  var dob           = document.getElementById("dob").value;
                  var str   = reg_no;
		  var str1  = dob;
                  var n = str.length;
		 var n1 = str1.length;
                 if(n1 == 10){
		  url = url+'&reg_no='+reg_no+'&dob='+dob+'&checking=true';
	
         	 
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
		
	
	// native XMLHttpRequest object
   document.getElementById(target).innerHTML = '<img src="../images/ajax-loader11.gif" width="16" height="16" />';
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
 
	function formvalidation(form,sub1,hons,stream)
	{ //alert(stream);alert(hons);alert(sub1);
             if(hons=='1'){     
				  if(sub1=='MUSH')
				  { 
				 	if(document.getElementById("main_subject").value == '')
					{
				                     alert("Please select HONOURS COURSE");
				                     return false;
				                       
					}
		    		   }   
		 			if(document.getElementById("generic").value == '')
					{
				                     alert("Please select GENERIC ELECTIVE");
				                     return false;
				                       
					}
		

				        if(document.getElementById("mil").value == '')
					{
				                     alert("Please select AECC ELECTIVE (MIL)");
				                     return false;
				                       
					}
		                  
                        }
                     else if(hons=='0')
                       {
                                    if(stream=='BA')
                                   {
		                               if(document.getElementById("other_subject").value == '')
						{
						             alert("Please select OTH. DISCIPLINE COURSE");
						             return false;
						               
						}
						else if(document.getElementById("lcc").value == '')
						{
						             alert("Please select LANGUAGE CORE COURSE");
						             return false;
						               
						}
						else if(document.getElementById("mil").value == '')
						{
						             alert("Please select AECC ELECTIVE (MIL)");
						             return false;
						               
						}
                                   }
				  else if(stream=='BCOM')
                                   {
		                               if(document.getElementById("lcc").value == '')
						{
						             alert("Please select LANGUAGE CORE COURSE");
						             return false;
						               
						}
						else if(document.getElementById("mil").value == '')
						{
						             alert("Please select AECC ELECTIVE (MIL)");
						             return false;
						               
						}
                                   }
				  else if(stream=='BSC')
                                  {
		                               if(document.getElementById("other_subject1").value == '')
						{
						             alert("Please select OTH. DISCIPLINE COURSE-1");
						             return false;
						               
						}
						else if(document.getElementById("other_subject2").value == '')
						{
						             alert("Please select OTH. DISCIPLINE COURSE-2");
						             return false;
						               
						}
						else if(document.getElementById("mil").value == '')
						{
						             alert("Please select AECC ELECTIVE (MIL)");
						             return false;
						               
						}
                                   }

                       }
                       
                      
		
	}
	function formvalidation1(form)
	{
                           if(confirm('Are you sure you want to confim?Selection cannot be UNDONE')) {return true; }
		                   
                            else{    return false; }

	}

function formvalidation2(form)
	{
                           if(confirm('Are you sure you want to submit?Please review once more as submitted data cannot be modified')) {return true; }
		                   
                            else{    return false; }

	}

function formvalidation3(form)
	{
                           if(confirm('Are you sure you want to submit?')) {return true; }
		                   
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


function formvalidation4(form,hons,stream)
{
	if(hons=='0'){
		if(stream=='BSC')
		{

			if(document.getElementById("main_subject").value == document.getElementById("other_subject1").value){
				alert("CORE COURSE (DISCIPLINE-1) and CORE COURSE (DISCIPLINE-2) can't be the same");
				return false;
			}
			else if(document.getElementById("main_subject").value == document.getElementById("other_subject2").value){
				alert("CORE COURSE (DISCIPLINE-1) and CORE COURSE (DISCIPLINE-3) can't be the same");
				return false;
			}
			else if(document.getElementById("other_subject1").value == document.getElementById("other_subject2").value){
				alert("CORE COURSE (DISCIPLINE-2) and CORE COURSE (DISCIPLINE-3) can't be the same");
				return false;
			}
      else if(document.getElementById("skill").value == ''){
        alert("Please Choose SKILL ENHANCEMENT COURSE");
        return false;
      }
			else{
				return true;
			}
		}else if(stream=='BA')
		{
			if(document.getElementById("main_subject").value == document.getElementById("other_subject").value){
				alert("CORE COURSE (DISCIPLINE-1) and CORE COURSE (DISCIPLINE-2) can't be the same");
				return false;
			}
      else if(document.getElementById("skill").value == ''){
        alert("Please Choose SKILL ENHANCEMENT COURSE");
        return false;
      }
			else{
				return true;
			}
		}
	}
else if(hons=='1')
    {
      if(document.getElementById("generic").value == ''){
        alert("Please Choose GENERIC ELECTIVE-1 COURSE-1");
        return false;
      }      
      else{
        return true;
      }
    }
}

function ChangeSkillEnhancement1(){
	var userInput = document.getElementById('main_subject').value;
	var val = '['.concat(userInput).concat('PSE ]');
	//alert(val)
	document.getElementById('senhancement').innerHTML = val;
}

function ChangeSkillEnhancement(){
	var userInput = document.getElementById('main_subject').value;
  var userInput1 = document.getElementById('main_subject').value;
  
	//alert(userInput);
	var subject = { ARB: "Arabic",
			BNG: "Bengali",
			BOT: "Botany",
			CEM: "Chemistry",
			CMS: "Computer Science",
			COM: "Commerce",
			DFS: "Defence studies",
			ECO: "Economics",
			EDC: "Education",
			ENG: "English",
			ENV: "Environmental Science",
			FMS: "Flim Studies",
			FNT: "Food & Nutrition",
			GEO: "Geography",
			HIN: "Hindi",
			HIS: "History",
			MBT: "Molecular Biology and Biotechnology",
			MCB: "Micro Biology",
			MLB: "Molecular Biology",
			MSD: "Media Studies",
			MTM: "Mathematics",
			PED: "Physical Education",
			PHI: "Philosophy",
			PHS: "Physics",
			PHY: "Physiology",
			PLS: "Political Science",
			SAN: "Sanskrit",
			SOC: "Sociology",
			STS: "Statistics",
			URD: "Urdu",
			ZOO: "Zoology",
			ALE: "Alternative English (LCC)"};

	//alert(subject[userInput]);
  if(userInput1 == '')	{
	var val = subject[userInput].concat(' [').concat(userInput).concat('PSE ]');
  }else {

    var val = subject[userInput1].concat(' [').concat(userInput1).concat('PSE ]');
  }
	//alert(val)
	document.getElementById('senhancement').innerHTML = val;
}
function getgeneric(url,target,val1, val2)
{       

  //alert(val1);
  //alert(val2);
  var generic = val1;
  var generic1 = val2;
  var str   = generic;
  var n = str.length;
                  
  if(n > 0 ){
  url = url+'&paper_id='+generic+'&generic1='+generic1+'&checking=true';
               
    pageload(url,target);
    }
    else{ document.getElementById(target).innerHTML ='';}
        
}

function getSkillEnhancement(url,target,val1, val2,val3, val4)
{       

  //alert(val4);
  //alert(val2);
  //alert(val3);
  //alert(target);
  var generic = val2;
  var generic1 = val3;
  var generic2 = val4;
  var cc = val1;
  var str   = generic;
  var n = str.length;
                  
  if(n > 0 ){
  url = url+'&paper_id='+generic+'&paper_id1='+generic1+'&paper_id2='+generic2+'&checking=true';
               
    pageload(url,target);
    }
    else{ document.getElementById(target).innerHTML ='';}
        
}


