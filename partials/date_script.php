<script type="text/javascript">    
    function configureDateDropDown(month,day) 
    {
        switch (month.value) 
        {
            case '1': case '3': case '5': case '7': case '8': case '10': case '12':
                day.options.length = 0;
                createOption2(day);
                for (i = 1; i <= 31; i++) 
                {
                    createDayOption(day, i, i);
                }
                break;

            case '2':
                day.options.length = 0;
                createOption2(day);
                for (i = 1; i <= 29; i++) 
                {
                    createDayOption(day, i, i);
                }
                break;

            case '4': case '6': case '9': case '11': 
                day.options.length = 0;
                createOption2(day);
                for (i = 1; i <= 30; i++) 
                {
                    createDayOption(day, i, i);
                }
                break;
        }
    }

    function createDayOption(ddl, text, value) 
    {
        var opt = document.createElement('option');   
        opt.value = value;
        opt.text = text;
        ddl.options.add(opt);
    }

    function createOption2(ddl) 
    {
        var opt = document.createElement('option');   
        opt.value = "DD";
        opt.text = "DD";
        ddl.options.add(opt);

        document.getElementById("day").options[0].disabled = true;
    }
</script>

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