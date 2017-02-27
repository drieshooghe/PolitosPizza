<?php
//src/Controllers/loginCheck.php
//WELLICHT NERGENS GEBRUIKT

$login = new \PolitosPizza\Models\Business\LoginSvc();
if($login->checkPwd($_POST["email"], $_POST["pwd"]) == true){
    $_SESSION["loggedIn"] = true;
    $test = new \PolitosPizza\Models\Data\LoginDAO();
    $_SESSION["custId"] = $test->getIdByEmail("dries.hooghe@outlook.com");
    setcookie("custEmail", $_POST["email"], time()+2678400);
    if(isset($_GET["src"]) && $_GET["src"] == "index"){
        header("location: showIndex.php");
        exit(0);
    } else {
        header("location: showSummary.php");
        exit(0);
    }
} else {
    header("location: showLoginScreen.php?error=wrongpwd");
    exit(0);
}