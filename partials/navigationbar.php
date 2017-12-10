<div id="full_header">

    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-sm" role="navigation">
        <button class="navbar-toggler navbar-toggler-right navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="HomePage.php">OCES</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-stacked mr-auto" >
                <?php if($_SESSION['navbar'] == "System Administrator") : ?>
                    <ul class="navbar-nav nav-stacked mr-auto" >
                        <li class="nav-item">
                            <a class="nav-link" href="CreateUserAccount.php">Create User Account</a>
                        </li>
                        <li class="nav-item" id="nav_grp1">
                            <a class="nav-link" href="UpdateUserAccount.php">Update User Account</a>
                        </li>
                    </ul>
                <?php endif; ?>

                <?php if($_SESSION['navbar'] == "CSCB Representative" ||
                    $_SESSION['navbar'] == "OCES Administrator" ||
                    $_SESSION['navbar']  == "OCES Staff" ||
                    $_SESSION['navbar'] == "System Administrator") : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="CreateReport.php">Create Report</a>
                    </li>
                <?php endif; ?>

                <?php if($_SESSION['navbar'] == "OCES Administrator" ||
                    $_SESSION['navbar'] == "System Administrator"): ?>
                    <li class="nav-item" id="nav_grp1">
                        <a class="nav-link" href="ApproveReport.php">Approve Report</a>
                    </li>
                <?php endif; ?>

                <?php if($_SESSION['navbar'] != "OCES Staff") : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Report</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <?php if($_SESSION['navbar'] == "Full-Time Faculty" ||
                                $_SESSION['navbar'] == "Part-Time Faculty"          ||
                                $_SESSION['navbar'] == "Technical Support Services" ||
                                $_SESSION['navbar'] == "Academic Support Services"  ||
                                $_SESSION['navbar'] == "Office Personnel"           ||
                                $_SESSION['navbar'] == "Field Personnel") : ?>
                                <a class="dropdown-item" href="ViewUserRelatedReports.php">My Individual Outreach Activities</a>
                            <?php  endif; ?>

                            <?php if($_SESSION['navbar'] == "OCES Administrator" ||
                                $_SESSION['navbar'] == "System Administrator" ||
                                $_SESSION['navbar'] == "University Administrator"): ?>
                                <a class="dropdown-item" href="ViewReportByDate.php">By Date</a>
                                <a class="dropdown-item" href="ViewReportByInvolvement.php">By Involvement</a>
                                <a class="dropdown-item" href="ViewReportByDepartment.php">By Department</a>
                                <a class="dropdown-item" href="ViewReportByParticipant.php">By Participant</a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if($_SESSION['navbar'] == "Full-Time Faculty"          ||
                        $_SESSION['navbar'] == "Part-Time Faculty"          ||
                        $_SESSION['navbar'] == "Technical Support Services" ||
                        $_SESSION['navbar'] == "Academic Support Services"  ||
                        $_SESSION['navbar'] == "Office Personnel"           ||
                        $_SESSION['navbar'] == "Field Personnel" ||
                        $_SESSION['navbar'] == "OCES Administrator" ||
                        $_SESSION['navbar'] == "System Administrator" ||
                        $_SESSION['navbar'] == "CSCB Representative" ||
                        $_SESSION['navbar'] == "OCES Staff") : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="UpdateProfile.php">Update Profile</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a class="nav-link disabled" id="username_nav">
                        <?php
                        echo $_SESSION['username'];
                        ?>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="../partials/login/Logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="heading3"></div>
</div>
