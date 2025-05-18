<div class="text-center">
    <hr>
    <h2>Daftar Nama Owner Food Court</h2>
    </hr>
</div>

<a class="btn btn-info" href="main.php?p=owner_input">Tambah</a>
<a class="btn btn-danger" onclick="location.href='main.php'">Kembali</a>

<table class="table table-secondary table-striped">
    <thead>
        <tr>
            <th class='text-center align-middle'>ID</th>
            <th class='text-center align-middle'>Nama</th>
            <th class='text-center align-middle'>Nomor HP</th>
            <th class='text-center align-middle'>Alamat</th>
            <th class='text-center align-middle'>Gender</th>
            <th class='text-center align-middle'>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "koneksi.php";

        $sql = "SELECT * FROM owner WHERE aktif=1";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";
                echo "<td class='text-center align-middle'>" . $row["id_owner"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["nama_owner"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["no_telp"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["alamat"] . "</td>";
                echo "<td class='text-center align-middle'>" . $row["gender"] . "</td>";
                echo "<td class='text-center align-middle'>";

                $idedit = $row["id"];
                echo "<a class='btn btn-warning' href='main.php?p=owner_edit&id=" . $idedit . "'" . $row["id_owner"] . "'>Edit</a>";

                //echo "<a class='btn btn-warning' href='pages/anggota_edit.php?id=$idedit'" . $row["nomor"] . "'>Edit</a>";
        
                echo "<a class='btn btn-danger' href='main.php?p=owner_hapus&id=" . $idedit . "'" . $row["id_owner"] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
</table>