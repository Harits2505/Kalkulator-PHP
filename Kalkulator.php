<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator PHP - by Harits2505</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #202020;">
    <center>
        <h4 style="color: white; margin-top: 30px;">Kalkulator PHP by Harits2505</h4>
    </center>

    <?php
    $b1 = [1, 2, 3, 4, '+', 5, 6, 7, 8, '-', 9, '*', 0, '.', '/', '='];
    $bc = ['C'];
    $tombol = '';
    if (isset($_POST['tombol']) && in_array($_POST['tombol'], $b1)) {
        $tombol = $_POST['tombol'];
    }
    $hitungan = '';
    if (isset($_POST['hitungan']) && preg_match('~^(?:[\d.]+[* /+-]?)+$~', $_POST['hitungan'], $out)) {
        $hitungan = $out[0];
    }
    $tampilan = $hitungan . $tombol;

    if ($tombol == 'C') {
        $tampilan = '';
    } elseif ($tombol == '=' && preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~', $hitungan)) {
        $tampilan .= eval("return $hitungan;");
    }
    echo "<div class='calc'>";
    echo "<form method='POST' class='form'>";
    echo "<div class='card bg-primary'>";
    echo "<div class='card-body'>";
    echo "<center><input class='form-control inpt' type='text' name='hitungan' value='$tampilan' placeholder='0'><center>";
    echo "<div class='card-number'>";

    foreach (array_chunk($b1, 4) as $chunk) {

        foreach ($chunk as $button) {
            echo "<button ", (sizeof($chunk) != 4 ? " " : ""), " name='tombol' value='$button' class='btn btn-warning butn'>$button</button>";
        }
    }

    foreach ($bc as $clear) {
        echo "<button name='tombol' value='$clear' class='btn btn-danger butn-clear'>$clear</button>";
    }

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</form>";
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</body>

</html>