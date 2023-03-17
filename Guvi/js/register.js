function register()
{
if(localStorage.getItem("email")===null)
{
    
}
else
{
    alert(" User Already Logged In");
    window.location.replace("http://localhost/Guvi/profile.html");   
}
}
function registerUser()
{
    var email=document.getElementsByName("email")[0].value;
    var password=document.getElementsByName("password")[0].value;
    var con_password=document.getElementsByName("confirm_password")[0].value;
    var dob=document.getElementsByName("dob")[0].value;
    var college_name=document.getElementsByName("college_name")[0].value;
    var mobileno=document.getElementsByName("mobileno")[0].value;
    if(password==con_password)
    {
    $(document).ready(function() 
    {
    $.post('http://localhost/Guvi/php/register.php',
    {
        email:email,
        password:password
    }  ,
    function (data,status)
    {
        if(data==="email already exists")
        {
            alert(data);
            // document.getElementById("validation").innerHTML=data;
            // event.preventDefault();
            window.location.replace("http://localhost/Guvi/register.html");
        }
        else if(data=="Success")
        {
            // document.getElementById("validation").innerHTML="";
            window.location.replace("http://localhost/Guvi/login.html")
        }
        else if(data=="Failed")
        {
            window.location.replace("http://localhost/Guvi/register.html");
        }
    });
});
}
    else
    {
        alert("Password Mismatch")
    }
}

