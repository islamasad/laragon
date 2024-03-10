<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form method="post" action="">
        Jumlah tombol : <input type="text" name="nilai_i">
        <input type="submit" name="submit" value="OK">
    </form>
    <br>
    <?php
    
    function tampilkanTombol($i, $npm, $nama) {
        
        for ($j = 1; $j <= $i; $j++) {
            
            if ($j % 9 == 0) {
                echo "<button>Y6J</button>";
            } elseif ($j % 5 == 0) {
                echo "<button>$nama</button>";
            } elseif ($j % 3 == 0) {
                echo "<button>$npm</button>";
            } else {
                echo "<button>$j</button>";
            }
            echo " ";
        }
    }

    if (isset($_POST['submit'])) {
        $nilai_i = $_POST['nilai_i'];

        $npm = "20184357154";
        $nama = "M. Islam Asadullah";

        tampilkanTombol($nilai_i, $npm, $nama);
    }
    ?>

</body>
</html>
