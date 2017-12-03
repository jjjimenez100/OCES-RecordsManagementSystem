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
            success: function() 
            {
              $('#myModal').modal('hide');
              $('#modalSuccess').modal('show');

              setTimeout(function()
              {
                window.location.href = window.location.href;
              },2000)
            },
            error: function()
            {
              $('#myModal').modal('hide');
              $('#modalError').modal('show');
            }
          });
        });            
      }
    });
  });
</script>