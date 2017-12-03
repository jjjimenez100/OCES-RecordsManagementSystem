<script>
	$('#btn_login').on('click', function(event)
	{
		event.preventDefault();
		$.ajax(
		{
			type: "POST";
			url: "index.php",
			data: 
			{
				username: document.getElementById("username").value,
				password: document.getElementById("password").value
			},
			dataType: "json",
			success: function(data)
			{
				//navbar session
				//go to home page
			},
			error: function(data)
			{
				//unsuccessful login modal
			}
		})
	})
</script>