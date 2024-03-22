<?php

$namakolom = array(
    "nama" => "Nama",
    "tugas" => "Tugas",
    "uts" => "Nilai UTS",
    "uas" => "Nilai UAS",
    "avg" => "Nilai Rata-Rata",
    "nilai" => "Nilai Akhir",
);

$datamhs = array(
    array(
        "nama" => "Muhammad",
        "tugas" => 70,
        "uts" => 80,
        "uas" => 80
    ),
    array(
        "nama" => "Ahyar",
        "tugas" => 80,
        "uts" => 70,
        "uas" => 70
    ),
    array(
        "nama" => "Pratama",
        "tugas" => 90,
        "uts" => 70,
        "uas" => 60
    )
);

function hitungRataRata($tugas, $uts, $uas) {
    return round(($tugas + $uts + $uas) / 3, 2);
}

function hitungNilaiAkhir($rataRata) {
    if ($rataRata >= 80) {
        return "A";
    } else if ($rataRata >= 70) {
        return "B";
    } else if ($rataRata >= 60) {
        return "C";
    } else {
        return "D";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Table Simple</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <?php
            // Menampilkan nama kolom
            foreach ($namakolom as $column) {
                echo "<th>$column</th>";
            }
            ?>
        </tr>
        <?php
        // Menampilkan data mahasiswa
        foreach ($datamhs as $data) {
            echo "<tr>";
            foreach ($namakolom as $key => $column) {
                if ($key == "avg") {
                    // Menghitung rata-rata nilai
                    echo "<td>" . hitungRataRata($data["tugas"], $data["uts"], $data["uas"]) . "</td>";
                } elseif ($key == "nilai") {
                    // Menghitung nilai akhir
                    echo "<td>" . hitungNilaiAkhir(hitungRataRata($data["tugas"], $data["uts"], $data["uas"])) . "</td>";
                } else {
                    echo "<td>" . $data[$key] . "</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
