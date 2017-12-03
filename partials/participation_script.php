<script type="text/javascript">

    function configureDropDownLists(group,participation) 
    {
        var grpA = ["Conceptualization",
                    "Coordination Engagement",
                    "Resource Mobilization",
                    "Documentation and Evaluation"];

        var grpB = ["Lecturer",
                    "Accreditor",
                    "Trainer",
                    "Facilitator",
                    "Mentor",
                    "Resource Person",
                    "Evaluator",
                    "Consulting Process",
                    "Outcome Documenter",
                    "Organizational Leadership",
                    "Officer of a Professional Organization"];

        var grpC = ["Assistance in Community Organizing Needs Assessment",
                    "Assistance in Community Organizing Planning",
                    "Assistance in Community Organizing Monitoring",
                    "Assistance in Community Organizing Outcome Evaluation"];

        var grpD = ["Publications in practitioner journals or other venues aimed directly at improving management /community practices ",
                    "Research collaboration with in campus groups/ GOs/NGOs for community projects",
                    "  - Case studies based on research that lead to solutions to business /community problems",
                    "Adoption of new practices or operational approaches as a result of faculty scholarship",
                    "Presentations and workshops for business and management professionals; community extension practitioner",
                    "Tools/methods developed for partner communities",
                    "Evaluation/assessment of community projects to aid program management and development",
                    "Invention",
                    "Rehabilitation",
                    "Technical program development"];


        var grpE = ["Active Participation in the Activity"];

        var grpF = ["Resource Generation"];        

        switch (group.value) 
        {
            case 'A':
                participation.options.length = 0;
                createOption2(participation);
                for (i = 0; i < grpA.length; i++) 
                {
                    createOption(participation, grpA[i], grpA[i]);
                }
                break;

            case 'B':
                participation.options.length = 0; 
                createOption2(participation);
            for (i = 0; i < grpB.length; i++) 
                {
                    createOption(participation, grpB[i], grpB[i]);
                }
                break;

            case 'C':
                participation.options.length = 0;
                createOption2(participation);
                for (i = 0; i < grpC.length; i++) 
                {
                    createOption(participation, grpC[i], grpC[i]);
                }
                break;

            case 'D':
                participation.options.length = 0;
                createOption2(participation);

                for (i = 0; i < grpD.length; i++) 
                {
                    createOption(participation, grpD[i], grpD[i]);                    
                }createOption3(participation);
                break;

            case 'E':
                participation.options.length = 0; 
                createOption2(participation);
                for (i = 0; i < grpE.length; i++) 
                {
                    createOption(participation, grpE[i], grpE[i]);
                }
                break;

            case 'F':
                participation.options.length = 0;
                createOption2(participation);
                for (i = 0; i < grpF.length; i++) 
                {
                    createOption(participation, grpF[i], grpF[i]);
                }
                break;

            default:
                participation.options.length = 0;
                createOption2(participation);
                break;
        }
    }

    function createOption(ddl, text, value) 
    {
        var opt = document.createElement('option');   
        opt.value = value;
        opt.text = text;
        ddl.options.add(opt);
    }

    function createOption2(ddl) 
    {
        var opt = document.createElement('option');   
        opt.value = "Select Participation";
        opt.text = "Select Participation";
        ddl.options.add(opt);

        document.getElementById("participation").options[0].disabled = true;
    }

    function createOption3(ddl) 
    {
        document.getElementById("participation").options[3].disabled = true;
    }

</script>