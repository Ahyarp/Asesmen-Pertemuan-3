<?php
class Keuangan {
    public static function hitungUpahTotal(Karyawan $karyawan) {
        $upahPerJam = (float) $karyawan->getUpahPerJam();
        $jamKerja = (int) $karyawan->getJamKerja(); 
        $jamLembur = max(0, $jamKerja - 48);
        $jamNormal = $jamKerja - $jamLembur;
        return $jamNormal * $upahPerJam + $jamLembur * $upahPerJam * 1.15;
    }
}
?>