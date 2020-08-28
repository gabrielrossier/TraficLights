<?php
session_start();

//Setting session to 0 if not initialized
if (isset($_SESSION['state'])) {
    $state = $_SESSION["state"];
} else {
    $_SESSION["state"] = 0;
}
//Checking if button was pressed then redirect to prevent from re-submit form
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['NextStateRequired'])) {
    nextState();
    header('location: ../index.php');
}

//Increment trafic light state to next state
function nextState()
{
    if ($_SESSION["state"] < 3) {
        $_SESSION["state"] = $_SESSION["state"] + 1;
    } else {
        $_SESSION["state"] = 0;
    }
}

?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <title>ExerciseLooper</title>
    <link rel="stylesheet" media="all" href="../Content/Stylesheet.css"/>
</head>
<body>
<?php
echo "<div class='RedLight'><img src='../image/$state.png'/><form method='post'><input type='submit' name='NextStateRequired' value='&#xbb;'></form></div>";
?>
</body>
