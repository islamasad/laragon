<?php
require_once('jawabanNo3.php');

// Fungsi untuk mendapatkan data pegawai
function getPegawai($conn) {
    $sql = "SELECT * FROM pegawai";
    $result = $conn->query($sql);
    $pegawai = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pegawai[] = $row;
        }
    }
    return $pegawai;
}

// Fungsi untuk mendapatkan kode_gaji terakhir dari tabel gaji
function getLastGajiCode($conn) {
    $sql = "SELECT MAX(kode_gaji) AS last_gaji_code FROM gaji";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['last_gaji_code'] + 1;
    } else {
        return 1; // Jika tabel gaji masih kosong, kode_gaji dimulai dari 1
    }
}

// Fungsi Insert (Tambah Data)
if (isset($_POST['submit'])) {
    $kode_gaji = getLastGajiCode($conn);
    $kode_pegawai = $_POST['kode_pegawai'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tunjangan = $_POST['tunjangan'];
    $potongan = $_POST['potongan'];

    // Menghitung total gaji
    $total_gaji = $gaji_pokok + $tunjangan - $potongan;

    // Mendapatkan nama pegawai berdasarkan kode pegawai yang dipilih
    $sql_nama = "SELECT nama_pegawai FROM pegawai WHERE kode_pegawai = $kode_pegawai";
    $result_nama = $conn->query($sql_nama);

    if ($result_nama->num_rows > 0) {
        $row_nama = $result_nama->fetch_assoc();
        $nama_pegawai = $row_nama['nama_pegawai'];
    } else {
        $nama_pegawai = "Nama Pegawai Tidak Ditemukan";
    }

    // Memasukkan data ke dalam tabel gaji
    $sql = "INSERT INTO gaji (nama_pegawai, kode_gaji, gaji_pokok, tunjangan, potongan, total_gaji) 
            VALUES ('$nama_pegawai', $kode_gaji, $gaji_pokok, $tunjangan, $potongan, $total_gaji)";

    if ($conn->query($sql) === TRUE) {
        // Menampilkan output ketika data berhasil ditambahkan
        echo "Data berhasil ditambahkan.<br>";
        echo "Kode Gaji: " . $kode_gaji . "<br>";
        echo "Nama Pegawai: " . $nama_pegawai . "<br>";
        echo "Gaji Pokok: " . $gaji_pokok . "<br>";
        echo "Tunjangan: " . $tunjangan . "<br>";
        echo "Potongan: " . $potongan . "<br>";
        echo "Nilai rata-rata: " . $total_gaji . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mendapatkan data pegawai
$pegawai = getPegawai($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Data Gaji</title>
</head>
<body>
    <h2>Form Input Data Gaji</h2>
    <form method="post">
        <label>Kode Gaji:</label><br>
        <input type="number" name="kode_gaji" value="<?php echo getLastGajiCode($conn); ?>" required><br>
        <label>Nama Pegawai:</label><br>
        <select name="kode_pegawai">
            <?php foreach ($pegawai as $dataPegawai) { ?>
                <option value="<?php echo $dataPegawai["kode_pegawai"]; ?>"><?php echo $dataPegawai["nama_pegawai"]; ?></option>
            <?php } ?>
        </select><br>
        <label>Gaji Pokok:</label><br>
        <input type="number" name="gaji_pokok" required><br>
        <label>Tunjangan:</label><br>
        <input type="number" name="tunjangan" required><br>
        <label>Potongan:</label><br>
        <input type="number" name="potongan" required><br>
        <input type="submit" name="submit" value="Simpan Data">
    </form>
</body>
</html>
