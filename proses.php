<?php 
    class RentalMotor {
        private $nama;
        private $waktu;
        private $motor;
        private $jenisMotor = [
            "bebek" => ["Bebek", 50000],
            "beat" => ["Beat", 60000],
            "Vario" => ["Vario", 70000],
            "listrik" => ["Listrik", 80000],
        ];

        public function checkMember($nama) {
            $memberList = ['Ical', 'Dodon', 'Edo'];
            return in_array($nama, $memberList);
        }

        public function getHargaSewa($motor) {
            if(array_key_exists($motor, $this->jenisMotor)) {
                return $this->jenisMotor[$motor][1];
            } else {
                echo "<p class='text text-center text-warning fw-bold'>Jenis Motor Tidak Tersedia</p>";
            }
        }

        public function __construct($nama, $waktu, $motor) {
            $this->nama = $nama;
            $this->waktu = $waktu;
            $this->motor = $motor;
        }

        public function prosesForm() {
            $error = [];
            if(empty($this->nama)) {
                $error[] = "Nama harus diisi";
            }
        
            if(empty($error)) {
                $isMember = $this->checkMember($this->nama);
                
                // Periksa apakah jenis motor yang dipilih ada dalam daftar jenis motor
                if(array_key_exists($this->motor, $this->jenisMotor)) {
                    $hargaSewa = $this->jenisMotor[$this->motor][1];
                    $totalHarga = $hargaSewa * $this->waktu;
                    $pajak = 10000;
        
                    if($isMember) {
                        $diskon = ($totalHarga * 5) / 100;
                        $totalHarga -= $diskon;
                        echo "status ".$this->nama ." sebagai Member mendapatkan diskon 5%.<br>";
                    } else {
                        echo  "status ".$this->nama. " bukan sebagai member.<br>";
                    }
        
                    echo "Jenis motor : {$this->jenisMotor[$this->motor][0]} <br>";
                    echo "Harga rental 1 hari : Rp. " . number_format($hargaSewa, 2, ',', '.') . "<br>";
                    echo "Pajak : Rp. " . number_format($pajak, 2, ',', '.') . "<br>";
                    
                    echo "Total yang harus dibayar : Rp. " . number_format($totalHarga + $pajak, 2, ',', '.');
                } else {
                    echo "<p class='text text-center text-warning fw-bold'>Jenis Motor Tidak Ada</p>";
                }
            }
        }
    }
?>
