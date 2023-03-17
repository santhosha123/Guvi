function profile()
{
    if(localStorage.getItem("email"))
    {
    $(document).ready(function()
    {
        $.post('http://localhost/Guvi/php/profile.php',
        {
            email:localStorage.getItem("email"),
        },
        function (data,status)
        {
              var obj = jQuery.parseJSON ( data );
              document.getElementById("email").innerHTML=obj.email;
              document.getElementById("password").innerHTML=obj.password;
            //   window.location.replace("http://localhost/Guvi/profile.html");
        }
        );
})
    }
    else
    {
        window.location.replace("http://localhost/Guvi/login.html");
    }

}
function logout()
{
    localStorage.removeItem("email");
    window.location.replace("http://localhost/Guvi/login.html");

}
function backtohome()
{
    window.location.replace("http://localhost/Guvi/index.html");

}

