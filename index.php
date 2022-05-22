<?php

# Nama : Irfan Mochamad Esa
# NIM  : 2005568

# Interface harga
interface harga
{
    public function hitungHargaSecond();
    public function statusHarga();
}

# Parent class kendaraan
class kendaraan
{
    # Attribute dari kendaraan
    public $nama;
    public $harga;
    public $warna;
    public $fuel;
    public $tahun;
    public $subsidi;

    # constructor
    public function __construct($nama, $harga, $warna, $fuel, $tahun)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->warna = $warna;
        $this->fuel = $fuel;
        $this->tahun = $tahun;
    }

    # setter
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function setWarna($warna)
    {
        $this->warna = $warna;
    }

    public function setFuel($fuel)
    {
        $this->fuel = $fuel;
    }

    public function setTahun($tahun)
    {
        $this->tahun = $tahun;
    }

    # getter
    public function getNama()
    {
        return $this->nama;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function getWarna()
    {
        return $this->warna;
    }

    public function getFuel()
    {
        return $this->fuel;
    }

    public function getTahun()
    {
        return $this->tahun;
    }

    # method untuk mengecek apakah kendaraan disubsidi atau tidak
    public function dapatSubsidi()
    {
        if ($this->fuel == 'Premium' && $this->tahun < 2005) {
            $this->subsidi = 'Ya';
        } else {
            $this->subsidi = 'Tidak';
        }
    }
}

# class mobil menginherit kendaraan dan menggunakan interface harga
class mobil extends kendaraan implements harga
{
    # attribute class mobil
    public $roda;
    public $kategori;
    public $hargaSecond;

    # constructor
    public function __construct($nama, $harga, $warna, $fuel, $tahun)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->warna = $warna;
        $this->fuel = $fuel;
        $this->tahun = $tahun;
        $this->roda = 4;
    }

    # method penghitung harga second
    public function hitungHargaSecond()
    {
        if ($this->tahun > 2005) {
            $this->hargaSecond = $this->harga * 80 / 100;
        } else if ($this->tahun <= 2005 && $this->tahun >= 2000) {
            $this->hargaSecond = $this->harga * 70 / 100;
        } else {
            $this->hargaSecond = $this->harga * 60 / 100;
        }
    }

    # method memberikan kategori mahal atau tidak
    public function statusHarga()
    {
        if ($this->harga > 500000000) {
            $this->kategori = 'Mahal';
        } else {
            $this->kategori = 'Murah';
        }
    }

    # method untuk print attribute kendaraan
    public function printInfo()
    {
        $this->hitungHargaSecond();
        $this->statusHarga();
        $this->dapatSubsidi();
        echo "Kendaraan <b>{$this->nama}</b>, memiliki <b>{$this->roda}</b> roda, berbahan bakar <b>{$this->fuel}</b>, 
        dan mempunyai harga <b>{$this->harga}</b> yang termasuk ke dalam kategori kendaraan dengan harga <b>{$this->kategori}</b>";
    }
}

# class motor menginherit kendaraan dan menggunakan interface harga
class motor extends kendaraan implements harga
{
    # attribute class motor
    public $roda;
    public $kategori;
    public $hargaSecond;

    # constructor
    public function __construct($nama, $harga, $warna, $fuel, $tahun)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->warna = $warna;
        $this->fuel = $fuel;
        $this->tahun = $tahun;
        $this->roda = 2;
    }

    # method penghitung harga second
    public function hitungHargaSecond()
    {
        if ($this->tahun > 2005) {
            $this->hargaSecond = $this->harga * 75 / 100;
        } else if ($this->tahun <= 2005 && $this->tahun >= 2000) {
            $this->hargaSecond = $this->harga * 65 / 100;
        } else {
            $this->hargaSecond = $this->harga * 55 / 100;
        }
    }

    # method memberikan kategori mahal atau tidak
    public function statusHarga()
    {
        if ($this->harga > 20000000) {
            $this->kategori = 'Mahal';
        } else {
            $this->kategori = 'Murah';
        }
    }

    # method untuk print attribute kendaraan
    public function printInfo()
    {
        $this->hitungHargaSecond();
        $this->statusHarga();
        $this->dapatSubsidi();
        echo "Kendaraan '{$this->nama}', jumlah roda '{$this->roda}', berbahan bakar '{$this->fuel}', '{$this->harga}' dan status harga '{$this->kategori}'";
    }
}

$mobil0 = new Mobil("Toyota Yaris", 160000000, "White", "Premium", "2011");

$motor0 = new Motor("Yamaha Mio", 15000000, "Black", "Premium", "2010");

$motor0->printInfo();
echo "</br>";
echo "</br>";
$mobil0->printInfo();
