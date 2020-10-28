<?
session_start();
if (isset($_SESSION['no_rm'])):
    session_destroy();
    header('location: login');

else:
    header('location: index.php');
endif;
