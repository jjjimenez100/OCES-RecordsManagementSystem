<script>
    var start = 1;
    var end = 12;    
    var options = "";

    options += "<option selected disabled>"+ "MM" +"</option>";
    for(var month = start ; month <=end; month++)
    {
      options += "<option>"+ month +"</option>";
    }

    document.getElementById("month").innerHTML = options;
</script>

<script>
    var start = 1;
    var end = 31;
    var options = "";

    options += "<option selected disabled>"+ "DD" +"</option>";
    for(var day = start ; day <=end; day++)
    {
      options += "<option>"+ day +"</option>";
    }

    document.getElementById("day").innerHTML = options;
</script>

<script>
    var start = 1950;
    var end = new Date().getFullYear();
    var options = "";

    options += "<option selected disabled>"+ "YYYY" +"</option>";
    for(var year = start ; year <=end; year++)
    {
      options += "<option>"+ year +"</option>";
    }
    
    document.getElementById("year").innerHTML = options;
</script>