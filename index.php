<?php
$errh = $errw = "";
$height = $weight = "";
$bmipass = "";

if ($_POST['submit']) {
    if (empty($_POST['height'])) {
        $errh = "<span style='color:#ed4337;
            font-size:17px; display:block'>Height is Required</span>";
        echo $errh;
    } else
        $height = validation($_POST['height']);
}

if ($_POST['submit']) {
    if (empty($_POST['weight'])) {
        $errw = "<span style='color:#ed4337;
        font-size:17px; display:block'>Weight is Required</span>";
    } else
        $weight = validation($_POST['weight']);

    if (empty($_POST['height'] && $_POST['weight'])) {
        echo "";
    } else {
        $bmi = ($weight) / ($height * $height);
        $bmipass = $bmi;
    }
}

function validation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="wrapper">

        <h2>Check your BMI</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="section1">
                <span>Enter your Height : </span>
                <input type="text" name="height" autocomplete="off" placeholder="Meter"><?php echo $errh; ?>
            </div>
            <div class="section2">
                <span>Enter your Weight : </span>
                <input type="text" name="weight" autocomplete="off" placeholder="Kilogram"><?php echo $errw; ?>
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Check BMI">
                <input type="reset" value="Clear">
            </div>
        </form>


        <?php
        error_reporting(0);
        echo "<span class='pass'>Your BMI is : " . number_format($bmipass, 2) . "</span>";
        if (isset($_POST['submit'])) {
            if ($bmipass >= 13.6 && $bmipass <= 18.5) {
                echo "<span style='$00203FFF; display:block; margin-top:5px; margin-right:50px'>Low Body Weight.
                You need to gain weight by eating moderately</span>";
        ?>
                <img src="assets/untitled.png">
            <?php
            } elseif ($bmipass > 18.5 && $bmipass <= 24.9) {
                echo "<span style='$00203FFF; display:block; margin-top:5px; margin-right:50px'>
                The standard of good health.</span>";
            ?>
                <img src="assets/untitled.png">
            <?php
            } elseif ($bmipass > 25 && $bmipass <= 29.9) {
                echo "<span style='$00203FFF; display:block; margin-top:5px; margin-right:50px'>
                Exercise needs to reduce excess weight.</span>";
            ?>
                <img src="assets/untitled.png">
            <?php
            } elseif ($bmipass > 30 && $bmipass <= 34.9) {
                echo "<span style='$00203FFF; display:block; margin-top:5px; margin-right:50px'>
            The first stage of obesity. It is necessary to choose food and exercise.</span>";
            ?>
                <img src="assets/untitled.png">
            <?php
            } elseif ($bmipass > 35 && $bmipass <= 39.5) {
                echo "<span style='$00203FFF; display:block; margin-top:5px; margin-right:50px'>
            The second stage of obesity. Moderate diet and exercise are required.</span>";
            ?>
                <img src="assets/untitled.png">
            <?php
            } elseif ($bmipass >= 40) {
                echo "<span style='$00203FFF; display:block; margin-top:5px; margin-right:50px'>
            Excess fat.<b style='color=$ed4337'> Fear of death. Need a doctor advice.</span>";
            ?>
                <img src="assets/untitled.png">
        <?php
            } else {
                echo "";
            }
        }
        ?>

    </div>
</body>

</html>