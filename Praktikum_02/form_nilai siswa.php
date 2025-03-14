<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>FORM NILAI SISWA</title>
    <style>
        @media (min-width: 426px) {
            form {
                width: 65%;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">sistem penilaian</a>
            </div>
        </nav>
    </header>

    <main role="main" class="container mt-3">
        <h3>form penilaian siswa</h3>
        <hr />
        <form class="mx-auto" action="" method="post">
            <input type="hidden" name="proses" value="Submit Nilai"> 
            <div class="form-group row">
                <label for="nama" class="col-5 col-form-label font-weight-bold text-right">Nama Lengkap</label>
                <div class="col-7">
                    <input id="nama" name="nama" type="text" required class="form-control">
                </div>
            </div>   
            <div class="form-group row">
                <label for="matkul" class="col-5 col-form-label font-weight-bold text-right">Mata Kuliah</label>
                <div class="col-7">
                    <select id="matkul" name="matkul" class="custom-select" required>
                        <option value="Dasar Dasar Pemrograman">Dasar Dasar Pemrograman</option>
                        <option value="Basis Data I">Basis Data I</option>
                        <option value="Pemrograman Web 1">Pemrograman Web 1</option> 
                    </select>
                </div> 
            </div>
            <div class="form-group row">
                <label for="nilai_uts" class="col-5 col-form-label font-weight-bold text-right">Nilai UTS</label>
                <div class="col-7">
                    <input id="nilai_uts" name="nilai_uts" type="number" class="form-control" required min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_uas" class="col-5 col-form-label font-weight-bold text-right">Nilai UAS</label>
                <div class="col-7">
                    <input id="nilai_uas" name="nilai_uas" type="number" class="form-control" required min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_tugas" class="col-5 col-form-label font-weight-bold text-right">Nilai Tugas/Praktikum</label>
                <div class="col-7">
                    <input id="nilai_tugas" name="nilai_tugas" type="number" class="form-control" required min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-5 col-7">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $proses = $_POST['proses'];
            $nama = $_POST['nama'];
            $matkul = $_POST['matkul'];
            $nilai_uts = $_POST['nilai_uts'];
            $nilai_uas = $_POST['nilai_uas'];
            $nilai_tugas = $_POST['nilai_tugas'];
            $nilai_akhir = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

            $status = ($nilai_akhir > 55) ? "Lulus" : "Tidak Lulus";

            if ($nilai_akhir >= 85 && $nilai_akhir <= 100) {
                $grade = "A";
            } elseif ($nilai_akhir >= 70) {
                $grade = "B";
            } elseif ($nilai_akhir >= 56) {
                $grade = "C";
            } elseif ($nilai_akhir >= 36) {
                $grade = "D";
            } elseif ($nilai_akhir >= 0) {
                $grade = "E";
            } else {
                $grade = "I"; 
            }

            switch ($grade) {
                case "A":
                    $predikat = "Sangat Memuaskan";
                    break;
                case "B":
                    $predikat = "Memuaskan";
                    break;
                case "C":
                    $predikat = "Cukup";
                    break;
                case "D":
                    $predikat = "Kurang";
                    break;
                case "E":
                    $predikat = "Sangat Kurang";
                    break;
                default:
                    $predikat = "Tidak Ada";
            }

            echo "<div class='mt-4 p-3 bg-light border rounded'>";
            echo "<h5>Hasil Penilaian</h5>";
            echo "<table class='table table-bordered'>";
            echo "<tr><th>Proses</th><td>$proses</td></tr>";
            echo "<tr><th>Nama</th><td>$nama</td></tr>";
            echo "<tr><th>Mata Kuliah</th><td>$matkul</td></tr>";
            echo "<tr><th>Nilai UTS</th><td>$nilai_uts</td></tr>";
            echo "<tr><th>Nilai UAS</th><td>$nilai_uas</td></tr>";
            echo "<tr><th>Nilai Tugas</th><td>$nilai_tugas</td></tr>";
            echo "<tr><th>Nilai Akhir</th><td>$nilai_akhir</td></tr>";
            echo "<tr><th>Status</th><td>$status</td></tr>";
            echo "<tr><th>Grade</th><td>$grade</td></tr>";
            echo "<tr><th>Predikat</th><td>$predikat</td></tr>";
            echo "</table>";
            echo "</div>";
        }
        ?>
    </main>

    <footer class="mt-5" style="bottom: 0; left: 0; right: 0; position: fixed;">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Develop By @ahusa &copy;<?= date("Y") ?></a>
            </div>
        </nav>
    </footer>
</body>

</html>
