<?php
class Karyawan {
    private $upahPerJam;
    private $jamKerja;

    public function __construct($upahPerJam, $jamKerja) {
        $this->upahPerJam = $upahPerJam;
        $this->jamKerja = $jamKerja;
    }

    public function getUpahPerJam() {
        return $this->upahPerJam;
    }

    public function getJamKerja() {
        return $this->jamKerja;
    }
}
?>