<div class="text-center">
    <hr>
    <h2>Daftar Nama Kasir Food Court</h2>
    </hr>
</div>

<a class="btn btn-info" href="main.php?p=kasir_input">Tambah Kasir</a>
<a class="btn btn-danger" onclick="location.href='main.php'">Kembali</a>

<table class="table table-secondary table-striped">
    <thead>
        <tr>
            <th class='text-center align-middle'>ID</th>
            <th class='text-center align-middle'>Nama</th>
            <th class='text-center align-middle'>Tempat Kasir</th>
            <th class='text-center align-middle'>No Handphone</th>
            <th class='text-center align-middle'>Alamat</th>
            <th class='text-center align-middle'>Gender</th>
            <th class='text-center align-middle'>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "koneksi.php";

        $sql = "SELECT * FROM kasir WHERE aktif=1";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";
                echo "<td class='text-center align-middle'>" . $row["id_kasir"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["nama_kasir"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["tempat_kasir"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["no_telp"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["alamat"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["gender"] . "</td>";
                echo "<td class='text-center align-middle'>";

                $idedit = $row["id"];
                echo "<a class='btn btn-warning' href='main.php?p=kasir_edit&id=" . $idedit . "'" . $row["id_kasir"] . "'>Edit</a>";

                //echo "<a class='btn btn-warning' href='pages/anggota_edit.php?id=$idedit'" . $row["nomor"] . "'>Edit</a>";
        
                echo "<a class='btn btn-danger' href='main.php?p=kasir_hapus&id=" . $idedit . "'" . $row["id_kasir"] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
</table>