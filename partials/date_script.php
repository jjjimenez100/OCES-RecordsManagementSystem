<script>
    var start = 1;
    var end = 12;
    var options = "";

    options += "<option value=\"\" selected disabled>"+ "MM" +"</option>";
    for(var month = start ; month <=end; month++)
    {
      options += "<option value='"+month+"'>"+ month +"</option>";
    }

    document.getElementById("month").innerHTML = options;
</script>

<script>
    var start = 1;
    var end = 31;
    var options = "";

    options += "<option value=\"\" selected disabled>"+ "DD" +"</option>";
    for(var day = start ; day <=end; day++)
    {
      options += "<option value='"+day+"'>"+ day +"</option>";
    }

    document.getElementById("day").innerHTML = options;
</script>

<script>
    var start = 1950;
    var end = new Date().getFullYear();
    var options = "";

    options += "<option value=\"\" selected disabled>"+ "YYYY" +"</option>";
    for(var year = start ; year <=end; year++)
    {
      options += "<option value='"+year+"'>"+ year +"</option>";
    }
    
    document.getElementById("year").innerHTML = options;
</script>

<!--

<?php if (isset($_POST['year']) && $_POST['year']=="$year") echo "selected";?>

<script>
    var start = 1950;
    var end = new Date().getFullYear();
    var options = "";

    options += "<option selected disabled>"+ "FROM" +"</option>";
    for(var from_year = start ; from_year <=end; from_year++)
    {
      options += "<option>"+ from_year +"</option>";
    }
    
    document.getElementById("from_year").innerHTML = options;
</script>

<script>
    var start = 1950;
    var end = new Date().getFullYear();
    var options = "";

    options += "<option selected disabled>"+ "TO" +"</option>";
    for(var to_year = start ; to_year <=end; to_year++)
    {
      options += "<option>"+ to_year +"</option>";
    }
    
    document.getElementById("to_year").innerHTML = options;
</script>

<script>
    var options = "";

    options += "<option selected disabled>"+ "SEMESTER" +"</option>";
    options += "<option>"+ "1ST" +"</option>";
    options += "<option>"+ "2ND" +"</option>";
    options += "<option>"+ "SUMMER" +"</option>";
    
    document.getElementById("semester").innerHTML = options;
</script>

-->