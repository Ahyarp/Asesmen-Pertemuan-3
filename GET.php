<?php
require_once 'karyawan.php';
require_once 'keuangan.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])) {
    $karyawan = new Karyawan($_GET["upahPerJam"], $_GET["jamKerja"]);
    $upahTotal = Keuangan::hitungUpahTotal($karyawan);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Upah Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }
        form {
            text-align: center;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Hitung Upah Karyawan</h2>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="upahPerJam">Jumlah upah per jam:</label><br>
            <input type="number" id="upahPerJam" name="upahPerJam"><br>
            <label for="jamKerja">Jumlah jam kerja:</label><br>
            <input type="number" id="jamKerja" name="jamKerja"><br>
            <input type="submit" name="submit" value="Hitung">
        </form>

        <?php if (isset($upahTotal)) : ?>
            <div class="result">
                <h2>Hasil Perhitungan Upah Karyawan</h2>
                <p><strong>Jumlah upah per jam:</strong> <?php echo $karyawan->getUpahPerJam(); ?></p>
                <p><strong>Jumlah jam kerja:</strong> <?php echo $karyawan->getJamKerja(); ?></p>
                <p><strong>Jumlah upah total:</strong> <?php echo $upahTotal; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>