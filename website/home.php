<?php
include "header.php";
?>
<div class="container">
    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $cekuser = $mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
        $jmluser = $cekuser->num_rows;
        $data = $cekuser->fetch_array();

        if ($jmluser > 0) {
            $_SESSION['id']       = $data['id'];
            $_SESSION['username']     = $data['username'];
            $_SESSION['password']     = $data['password'];
            $_SESSION['nama']  = $data['nama'];
            $_SESSION['foto']  = $data['foto'];
            $_SESSION['email']  = $data['email'];
            $_SESSION['no_hp']  = $data['no_hp'];
            $_SESSION['tgl_lahir']    = $data['tgl_lahir'];
            $_SESSION['alamat']    = $data['alamat'];
            $_SESSION['level']    = $data['level'];

            $_SESSION['timeout'] = time() + 1000;
            $_SESSION['login'] = 1;

            if ($_SESSION['level']=='admin') {
                header('location: admin/');
            }elseif ($_SESSION['level']=='dosen') {
                header('location: dosen/');
            }elseif ($_SESSION['level']=='mahasiswa') {
                header('location: mahasiswa/');
            }
            
        } else {
            echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Username atau password salah.</div>';
        }
    }
    ?>
    <form method="post" action="">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        <button type="submit" name="login" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include "footer.php";
?>