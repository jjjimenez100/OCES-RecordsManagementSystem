<script type="text/javascript">
    $(document).ready(function()
    {
        //Numbers only
        $("#empID").keypress(function(event) 
        {
            var inputValue = event.keyCode;
            if (inputValue != 8 && inputValue != 0 && (inputValue < 48 || inputValue > 57)) 
            {
                return false;
            }
        });

        //Letters and spaces only
        $("#fname,#mname,#lname,#newdept").keypress(function(event)
        {
            var inputValue = event.keyCode;
            if(!(inputValue >= 65 && inputValue <= 90) && !(inputValue >= 97 && inputValue <= 122) && (inputValue != 32)) 
            { 
              return false; 
            }
        });

        //No spaces
        $("#username,#password,#conpassword,#retypePassword").keypress(function(event)
        {
            var inputValue = event.keyCode;
            if(inputValue == 32) 
            { 
              return false; 
            }
        });
    });
</script>