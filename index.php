<body>
    <h1>CRUD database</h1>

    <!-- Create -->
    <h4>Create Datasiswa</h4>
    <form action="" method="POST">
    <label for="no">No Absen</label>
    <input type="number" name="no">
    <br>
    <label for="nama">Nama</label>
    <input type="text" name="nama">
    <br>
    <button type="submit" name="tambah">Tambah</button>
    <?php
        if(isset($_POST['tambah'])){
            $no = $_POST['no'];
            $nama = $_POST['nama'];

            $host='localhost';
            $password='';
            $username='root';
            $dbname='db_datasiswa';

            $cnn = mysqli_connect($host,$username,$password,$dbname);
            if(!$cnn){
                die("Koneksi Failed : ".mysqli_connect_error());
            }
            
            mysqli_select_db($cnn,"db_datasiswa");
            
            $query = "select * from siswa";
            $sql = "INSERT INTO siswa (nomor_absen,nama) VALUES('$no','$nama');";
            
            $tambah = mysqli_query($cnn,$sql);
            if (!$tambah){
                echo "Data GAGAL Ditambah <br/>";
            }else{
                echo "Data BERHASIL Ditambah <br/>";
            }

            mysqli_close($cnn);
        }
    ?>
    </form>


    <!-- Read -->
    <h4>Read Datasiswa</h4>
    <form action="" method="POST">
    <button type="submit" name="tampilkan">Tampilkan</button> <br>
    <?php
        if(isset($_POST['tampilkan'])){

            $host='localhost';
            $password='';
            $username='root';
            $dbname='db_datasiswa';

            $cnn = mysqli_connect($host,$username,$password,$dbname);
            if(!$cnn){
                die("Koneksi Failed : ".mysqli_connect_error());
            }
            mysqli_select_db($cnn,"db_datasiswa");
            $sql = "SELECT nomor_absen, nama FROM siswa;";

            $tampil = mysqli_query($cnn,$sql);

            while ($data = mysqli_fetch_array($tampil)){ 
                echo "No : ". $data['nomor_absen']."<br/>";
                echo "Nama : ". $data['nama']."<br/>";
            }
            mysqli_close($cnn);
        }
    ?>
    </form>

    <!-- Update -->
    <h4>Update Datasiswa</h4>
    <form action="" method="POST">
    <label for="no">No Absen</label>
    <input type="number" name="no">
    <br>
    <label for="nama">Nama</label>
    <input type="text" name="nama">
    <br>
    <button type="submit" name="update">Update</button>
    <?php
        if(isset($_POST['update'])){
            $no = $_POST['no'];
            $nama = $_POST['nama'];

            $host='localhost';
            $password='';
            $username='root';
            $dbname='db_datasiswa';

            $cnn = mysqli_connect($host,$username,$password,$dbname);
            if(!$cnn){
                die("Koneksi Failed : ".mysqli_connect_error());
            }

            mysqli_select_db($cnn,"db_datasiswa");

            $query = "select * from siswa";
            $sql = "UPDATE siswa SET nama = '$nama' WHERE nomor_absen = '$no';";

            $update = mysqli_query($cnn,$sql);

            if (!$update){
                echo "Data GAGAL Diupdate <br/>";
            }else{
                echo "Data BERHASIL Diupdate <br/>";
            }
        }
    ?>
    </form>


    <!--Delete -->
    <h4>Delete Datasiswa</h4>
    <form action="" method="POST">
    <label for="no">No Absen</label>
    <input type="number" name="no">
    <br>
    <button type="submit" name="hapus">Hapus</button>
    <?php
        if(isset($_POST['hapus'])){
            $no = $_POST['no'];

            $host='localhost';
            $password='';
            $username='root';
            $dbname='db_datasiswa';

            $cnn = mysqli_connect($host,$username,$password,$dbname);
            if(!$cnn){
                die("Koneksi Failed : ".mysqli_connect_error());
            }

            mysqli_select_db($cnn,"db_datasiswa");

            $query = "select * from siswa";
            $sql = "DELETE FROM siswa WHERE nomor_absen = '$no';";

            $hapus = mysqli_query($cnn,$sql);

            if (!$hapus){
                echo "Data GAGAL Dihapus <br/>";
            }else{
                echo "Data BERHASIL Dihapus <br/>";
            }
        }
    ?>
    </form>
</body>