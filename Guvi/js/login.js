function validateLogin(event)
{
    var email=document.getElementsByName("email")[0].value;
    var password=document.getElementsByName("password")[0].value;
    $(document).ready(function()
    {
        $.post('http://localhost/Guvi/php/login.php',
        {
            email:email,
            password:password
        },
        function (data,status)
        {
            if(data==="Wrong Password")
            {
                alert(data);
            }
            else if(data=="WRONG USER NAME OR PASSWORD")
            {
                alert("INCORRECT MAIL");
            }
            else
            {
                localStorage.setItem("email",email);
                token=data.toString();
                window.location.replace("http://localhost/Guvi/profile.html");

            }
        }
        );
})

}
