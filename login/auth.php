<?php
if (isset($_POST['masuk'])):
    include "../connect.php";
    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $sql = "SELECT no_rm, nama FROM pasien WHERE username = '$username' AND password = '$pass'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0):
        session_start();
        while ($row = $result->fetch_object()):
            $_SESSION['no_rm'] = $row->no_rm;
            $_SESSION['nama'] = $row->nama;
            header("location: ../dashboard");
        endwhile;

    else:
        session_abort();
        echo "
        <script>window.alert('Username/Password salah')</script>
        ";
    endif;

endif;



