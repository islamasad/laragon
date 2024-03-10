<?php
require_once('jawabanNo3.php');

// Variabel untuk menentukan mode Tambah Data atau Edit Data
$mode = 'tambah'; // Default mode adalah Tambah Data

// Variabel untuk menyimpan kode pegawai yang akan diedit 
$edit_kode = '';

// Fungsi Create (Tambah Data)
if (isset($_POST['tambah'])) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];

    $sql = "INSERT INTO pegawai (nama_pegawai, alamat, telp, email) VALUES ('$nama_pegawai', '$alamat', '$telp', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fungsi Read 
$sql = "SELECT * FROM pegawai";
$result = $conn->query($sql);

// Fungsi Update 
if (isset($_POST['edit'])) {
    $kode_pegawai = $_POST['kode_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];

    $sql = "UPDATE pegawai SET nama_pegawai='$nama_pegawai', alamat='$alamat', telp='$telp', email='$email' WHERE kode_pegawai=$kode_pegawai";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diubah.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fungsi Delete 
if (isset($_GET['hapus'])) {
    $kode_pegawai = $_GET['hapus'];

    $sql = "DELETE FROM pegawai WHERE kode_pegawai=$kode_pegawai";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fungsi Edit (Form Edit Data)
if (isset($_GET['edit'])) {
    $edit_kode = $_GET['edit']; // Mengambil kode pegawai yang akan diedit
    $mode = 'edit'; // Mengubah mode menjadi Edit Data

    // Mengambil data pegawai yang akan diedit
    $sql = "SELECT * FROM pegawai WHERE kode_pegawai=$edit_kode";
    $result_edit = $conn->query($sql);

    if ($result_edit->num_rows == 1) {
        $row = $result_edit->fetch_assoc();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pegawai</title>
</head>
<body>
    <h1>CRUD Pegawai</h1>

    <!-- Form untuk input data pegawai -->
    <form method="post" action="">
        <input type="hidden" name="kode_pegawai" value="<?php echo $edit_kode; ?>">
        Nama Pegawai: <input type="text" name="nama_pegawai" value="<?php if ($mode == 'edit') echo $row['nama_pegawai']; ?>" required><br>
        Alamat: <input type="text" name="alamat" value="<?php if ($mode == 'edit') echo $row['alamat']; ?>" required><br>
        Telepon: <input type="text" name="telp" value="<?php if ($mode == 'edit') echo $row['telp']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php if ($mode == 'edit') echo $row['email']; ?>" required><br>

        <!-- Tombol Simpan jika dalam mode Edit, atau Tambah Data jika dalam mode Tambah -->
        <input type="submit" name="<?php echo ($mode == 'edit') ? 'edit' : 'tambah'; ?>" value="<?php echo ($mode == 'edit') ? 'Simpan' : 'Tambah Data'; ?>">
    </form>

    <!-- Tabel untuk menampilkan data pegawai -->
    <table border="1">
        <tr>
            <th>Kode Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["kode_pegawai"] . "</td>";
                echo "<td>" . $row["nama_pegawai"] . "</td>";
                echo "<td>" . $row["alamat"] . "</td>";
                echo "<td>" . $row["telp"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><a href='?hapus=" . $row["kode_pegawai"] . "'>Hapus</a> | <a href='?edit=" . $row["kode_pegawai"] . "'>Edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data pegawai.</td></tr>";
        }
        ?>
    </table>

</body>
</html>
