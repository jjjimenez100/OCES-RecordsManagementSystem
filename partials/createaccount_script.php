<script>
  $(function() 
  {
    $('form').on('submit', function(e) 
    {
      e.preventDefault();

      var empID = $('#empID').val();
      var fname = $('#fname').val();
      var mname = $('#mname').val();
      var lname = $('#lname').val();
      var username = $('#username').val();
      var password = $('#password').val();
      var conpassword = $('#conpassword').val();
      var poslevel = $('#poslevel').val();
      var dept = $('#dept').val();
      var month = $('#month').val();
      var day = $('#day').val();
      var year = $('#year').val();

      if(password != conpassword)
      {
        $('#modalNotMatch').modal('show');
      }

      else
      {
        $('#empid').text(empID);
        $('#first').text(fname);
        $('#middle').text(mname);
        $('#last').text(lname);
        $('#user').text(username);
        $('#pass').text(password);
        $('#acctype').text(poslevel);
        $('#department').text(dept);
        $('#mm').text(month);
        $('#dd').text(day);
        $('#yyyy').text(year);

        $('#myModal').modal('show');
        
        $('.btn_proceed').click(function()
        {
          $.ajax(
          {
            type: 'POST',
            url: '../partials/CreateAccount.php',
            data: $('form').serialize(),
            dataType: 'json',
            success: function(data) 
            {
              $('#myModal').modal('hide');  

              if(data.status == 'success')
              {                                
                $('#modalSuccess').modal('show');

                setTimeout(function()
                {
                  window.location.href = window.location.href;
                },2000)
              }
              else if(data.status == 'error')
              {
                $('#errorSignUp').text('Unsuccessful sign-up.');
                $('#modalError').modal('show');

                $('.btn_proceed').unbind('click');
              }

              data.status = '';                           
            },
            error: function(x, y)
            {
              $('#myModal').modal('hide');

              if (x.status == 0) 
                $('#errorSignUp').text('There is a problem with your network.');
              else if(x.status == 404)
                $('#errorSignUp').text('Requested URL not found.');
              else if(x.status == 500) 
                $('#errorSignUp').text('Internel server error.');
              else if(y == 'parsererror')
                $('#errorSignUp').text('Parsing JSON request failed.');
              else if(y == 'timeout')
                $('#errorSignUp').text('Request time out.');
              else
                $('#errorSignUp').text('Unknown error.');              

              $('#modalError').modal('show');
            }
          });
        });            
      }
    });
  });
</script>