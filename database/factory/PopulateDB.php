<?php
require dirname(__FILE__).'/../../config/autoloader.php';
class PopulateDB{
    private $colleges = ["Basic Education", "CCJEF", "CICT", "SBA",
                        "SEA", "SAS", "SED", "SNAMS"];
    private $maxYear, $minYear = 1970;
    private $dataSet = "abcdefghijklmnopqrstuvwxyz";
    private $roles = ["System Administrator", "OCES Administrator", "OCES Staff", //hard coded na muna to
                     "CSCB Representative", "University Administrator",
                     "Faculty", "NTP"]; //di naman ata magbabago
    private $defaultPassword = 12345;
    private $names = [];
    private $namesApiUrl = 'https://uinames.com/api/?region=germany&amount=';

    function __construct(){
        $this->maxYear = date('Y');
        $this->dataSet = str_split($this->dataSet, 1);
    }

    function populateDepartment(){
        foreach($this->colleges as $college){
            $newDepartment = new Department();
            $newDepartment->Department = $college;
            $newDepartment->save();
        }
    }

    function populateUser($count){
        $this->names = json_decode(file_get_contents($this->namesApiUrl.$count), true);
        foreach($this->names as $name){
            $newUser = new User();
            $newUser->UserID = $this->getRandomUserID();
            $newUser->First_Name = $name["name"];
            $newUser->Middle_Name = strtoupper($this->getRandomString(1, 2));
            $newUser->Last_Name = $name["surname"];
            $newUser->Date_Of_Employment = $this->getRandomDate('Y-m-d');
            $newUser->Position_Level = $this->getRandomRole();
            $newUser->Department = $this->getRandomDepartment();
            $newUser->Username = $this->getRandomString();
            $newUser->Password = $this->defaultPassword;
            $newUser->save();
        }
    }

    function getRandomUserID(){
        $randomID = rand(10000000, 99999999);
        while(User::where('UserID', $randomID)->count() != 0){
            $randomID = rand(10000000, 99999999);
        }

        return $randomID;
    }

    function getRandomDepartment(){
        $this->colleges = Department::all()->toArray();
        return $this->colleges[rand(0, count($this->colleges)-1)]["Department"];
    }

    function getRandomDate($format){
        $min = strtotime($this->minYear);
        $max = strtotime($this->maxYear);

        return date($format, rand($min, $max));
    }

    function getRandomString($min = 7, $max = 9){
        $length = rand($min, $max);
        $randomString = "";
        for($counter = 1; $counter <= $length; $counter++){
            $randomString .= $this->dataSet[rand(0, count($this->dataSet)-1)];
            $randomString = ($counter == 1) ? strtoupper($randomString) : $randomString;
        }

        return $randomString;
    }

    function getRandomRole(){
        return $this->roles[rand(0, count($this->roles)-1)];
    }

    /**
     * @param array $names
     */
    public function setNames(array $names)
    {
        $this->names = $names;
    }

    /**
     * @param string $namesApiUrl
     */
    public function setNamesApiUrl(string $namesApiUrl)
    {
        $this->namesApiUrl = $namesApiUrl;
    }

    /**
     * @param array $colleges
     */
    public function setColleges(array $colleges)
    {
        $this->colleges = $colleges;
    }

    /**
     * @param false|string $maxYear
     */
    public function setMaxYear($maxYear)
    {
        $this->maxYear = $maxYear;
    }

    /**
     * @param int $minYear
     */
    public function setMinYear(int $minYear)
    {
        $this->minYear = $minYear;
    }

    /**
     * @param array|string $dataSet
     */
    public function setDataSet($dataSet)
    {
        $this->dataSet = $dataSet;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param int $defaultPassword
     */
    public function setDefaultPassword(int $defaultPassword)
    {
        $this->defaultPassword = $defaultPassword;
    }
}
