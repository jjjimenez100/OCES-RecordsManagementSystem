<script>
  $(function() 
  {
    $('.updateForm').on('submit', function(e) 
    {
      e.preventDefault();

      var empID = $('#empID').val();
      var fname = $('#fname').val();
      var mname = $('#mname').val();
      var lname = $('#lname').val();
      var username = $('#username').val();
      var password = $('#password').val();
      var conpassword = $('#retypePassword').val();
      var poslevel = $('#poslevel').val();
      var dept = $('#dept').val();
      var month = $('#month').val();
      var day = $('#day').val();
      var year = $('#year').val();

      if(password != conpassword)
      {
        $('#modalNotMatch').modal('show');
        $('.btn_proceed').unbind('click');
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
            url: '../partials/UpdateAccount.php',
            data: $('form').serialize(),
            dataType: 'json',
            success: function(data) 
            {
              $('#myModal').modal('hide');  

              if(data.status == 'success')
              {                                
                $('#modalSuccessUpdate').modal('show');

                setTimeout(function()
                {
                  window.location.href = window.location.href;
                },2000)
              }
              else if(data.status == 'error')
              {
                $('#errorUpdate').text('Unsuccessful update.');
                $('#modalErrorUpdate').modal('show');

                $('.btn_proceed').unbind('click');
              }

              data.status = '';                           
            },
            error: function(x, y)
            {
              $('#myModal').modal('hide');

              if (x.status == 0) 
                $('#errorUpdate').text('There is a problem with your network.');
              else if (x.status == 403) 
              	$('#errorUpdate').text('Forbidden access.');
              else if(x.status == 404)
                $('#errorUpdate').text('Requested URL not found.');
              else if(x.status == 500) 
                $('#errorUpdate').text('Internel server error.');
              else if(y == 'parsererror')
                $('#errorUpdate').text('Parsing JSON request failed.');
              else if(y == 'timeout')
                $('#errorUpdate').text('Request time out.');
              else
                $('#errorUpdate').text('Unknown error.');              
                
              $('#modalErrorUpdate').modal('show');
            }
          });
        });            
      }
    });
  });
</script>