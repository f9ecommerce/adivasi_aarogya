function formVal()
{
var name=$("#name1").val();
var email=$("#email1").val();
var message=$("#message1").val();

if(name=="" ||  email=="" )
{
   if(name==""){ $("#name1").css("border-color", "red"); } else {$("#name1").css("border-color", "");}
   if(email==""){$("#email1").css("border-color", "red"); } else {$("#email1").css("border-color", "");}
 

   return false;

}
 else if(checkemail(email)==false){
  $("#name1").css("border-color", "");
 
  $("#email1").css("border-color", "red"); 
 return false;
}
else {

$("#name1").css("border-color", "");
$("#email1").css("border-color", "");



 $.ajax({
      type: 'POST',
       url: "contactform.php",
      data: {name:name,email:email,message:message},
      dataType: "text",
      success: function(resultData) { if(resultData==1) { alert("Mail sent succesfully");

      $("#name1").val(''); 
      $("#email1").val('');
      $("#message1").val('');

     } 
        
       }
      });
  
}


}

function checkemail(email)
{
    var str=email;
    var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (filter.test(str))testresults=true;
    else{
      
    
    testresults=false;
    }
    return (testresults);
}

