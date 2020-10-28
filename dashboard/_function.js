function completeReg(id){
    window.location.href = "admin/daftar/update.php?no_antrian="+id;
}

function deleteReg(id){
    window.location.href = "admin/daftar/delete.php?no_antrian="+id;
}

function printReg(id){
    window.location.href = "user/daftar/print.php?no_antrian="+id;
}