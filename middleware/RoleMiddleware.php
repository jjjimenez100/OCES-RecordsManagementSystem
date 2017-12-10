<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 12/3/2017
 * Time: 8:07 PM
 */
class RoleMiddleware{
    public function __construct(string $userRole = null){
        if(!isset($userRole)){
            $this->redirectUser("../index.php");
        }

        else if($userRole == "System Administrator"){
            $this->createUserAccount = true;
            $this->updateUserAccount = true;
            $this->viewReportByDate = true;
            $this->viewReportByDepartment = true;
            $this->viewReportByParticipant = true;
            $this->viewReportByInvolvement = true;
            $this->createReport = true;
            $this->approveReport = true;
            $this->updateProfile = true;
            $this->updateDepartment = true;
        }

        else if($userRole == "OCES Administrator"){
            $this->viewReportByDate = true;
            $this->viewReportByDepartment = true;
            $this->viewReportByParticipant = true;
            $this->viewReportByInvolvement = true;
            $this->createReport = true;
            $this->approveReport = true;
            $this->updateProfile = true;
        }

        else if($userRole == "OCES Staff" || $userRole == "CSCB Representative"){
            $this->createReport = true;
            $this->updateProfile = true;
        }

        else if($userRole == "University Administrator"){
            $this->viewReportByDate = true;
            $this->viewReportByDepartment = true;
            $this->viewReportByParticipant = true;
            $this->viewReportByInvolvement = true;
        }

        else if($userRole == "Full-Time Faculty"          ||
            $userRole == "Part-Time Faculty"          ||
            $userRole == "Technical Support Services" ||
            $userRole == "Academic Support Services"  ||
            $userRole == "Office Personnel"           ||
            $userRole == "Field Personnel"){
            $this->viewIndividualReport = true;
            $this->updateProfile = true;
        }

        else{
            die("User session was tampered with invalid data.");
        }
    }

    public function redirectUser(string $redirectPage = "HomePage.php"){
        header("Location: " . $redirectPage);
        exit();
    }

    public function getLoggedInUserRole(){
        $flag = true;
        foreach ($this->userRoles as $userRole){
            if($userRole == $_SESSION['navbar']){
                $flag = false;
            }
        }

        if($flag){
            return $_SESSION['navbar'];
        }
        else{
            die("User session was tampered with false data.");
        }
    }

    /**
     * @return bool
     */
    public function hasCreateUserAccountAccess(): bool
    {
        return $this->createUserAccount;
    }

    /**
     * @return bool
     */
    public function hasUpdateUserAccountAccess(): bool
    {
        return $this->updateUserAccount;
    }

    /**
     * @return bool
     */
    public function hasViewReportByDateAccess(): bool
    {
        return $this->viewReportByDate;
    }

    /**
     * @return bool
     */
    public function hasViewReportByDepartmentAccess(): bool
    {
        return $this->viewReportByDepartment;
    }

    /**
     * @return bool
     */
    public function hasViewReportByParticipantAccess(): bool
    {
        return $this->viewReportByParticipant;
    }

    /**
     * @return bool
     */
    public function hasViewReportByInvolvementAccess(): bool
    {
        return $this->viewReportByInvolvement;
    }

    /**
     * @return bool
     */
    public function hasViewIndividualReportAccess(): bool
    {
        return $this->viewIndividualReport;
    }

    /**
     * @return bool
     */
    public function hasCreateReportAccess(): bool
    {
        return $this->createReport;
    }

    /**
     * @return bool
     */
    public function hasApproveReportAccess(): bool
    {
        return $this->approveReport;
    }

    /**
     * @return bool
     */
    public function hasUpdateProfileAccess(): bool
    {
        return $this->updateProfile;
    }

    /**
     * @return array
     */
    public function getUserRoles(): array
    {
        return $this->userRoles;
    }

    /**
     * @return bool
     */
    public function hasUpdateDepartmentAccess(): bool
    {
        return $this->updateDepartment;
    }

    private $createUserAccount = false;
    private $updateUserAccount = false;
    private $viewReportByDate = false;
    private $viewReportByDepartment = false;
    private $viewReportByParticipant = false;
    private $viewReportByInvolvement = false;
    private $viewIndividualReport = false;
    private $createReport = false;
    private $approveReport = false;
    private $updateProfile = false;
    private $updateDepartment = false;
    private $userRoles = ["System Administrator", "OCES Administrator", "OCES Staff", "CSCB Representative"
        , "University Administrator", "Full-Time Faculty", "Part-Time Faculty", "Technical Support Services",
        "Academic Support Services", "Office Personnel", "Field Personnel"];
}

session_start();
if(!isset($_SESSION['navbar'])){
    $roleChecker = new RoleMiddleware();
    //redirect user to index.php
}

else{
    $roleChecker = new RoleMiddleware($_SESSION['navbar']);
}