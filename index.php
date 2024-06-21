<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="public/style.css"> -->
    <style>
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .output {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4 form-container">
        <h3 class="text-center mb-4">Rental Motor</h3>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pelanggan:</label>
                <input class="form-control" type="text" name="nama" id="nama">
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Lama Waktu Rental :</label>
                <input class="form-control" type="number" name="waktu" id="waktu">
            </div>
            <div class="mb-3">
                <label for="motor" class="form-label">Jenis Motor</label>
                <select name="motor" id="motor" class="form-select">
                <option disabled selected>Pilih jenisMotor</option>
                    <option value="mio">Mio</option>
                    <option value="beat">Beat</option>
                    <option value="vario">Vario</option>
                    <option value="listrik">Listrik</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i> Submit</button>
        </form>
        
        <!-- Output -->
        <div class="output text-center mt-4">
            <?php
            require ('proses.php');
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = $_POST["nama"];
                $waktu = $_POST["waktu"];
                $motor = $_POST["motor"];

                $rental = new RentalMotor($nama, $waktu, $motor);
                $rental->prosesForm();
            }
            ?>
        </div>
    </div>
</body>
</html>
