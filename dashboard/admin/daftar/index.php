<div class="card">
    <div class="card-header">List Semua Pendaftar</div>
    <div class="card-body">
        <!-- /.row--><br>
        <table id="table-daftar" class="table table-responsive-sm table-hover table-outline mb-0">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No Antrian</th>
                <th class="text-center">No Rekam Medis</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tanggal Antrian</th>
                <th class="text-center">Tanggal Pendaftaran</th>
                <th>Activity</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT daftar.no_antrian, daftar.status, daftar.no_rm, pasien.nama, daftar.tglDatangDaftar, daftar.waktu FROM daftar JOIN pasien WHERE pasien.no_rm = daftar.no_rm ORDER BY waktu DESC ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while ($row = $result->fetch_object()):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $row->no_antrian ?></td>
                        <td class="text-center"><?php echo $row->no_rm ?></td>
                        <td class="text-center"><?php echo $row->nama ?></td>
                        <td class="text-center"><?php echo $row->tglDatangDaftar ?></td>
                        <td class="text-center"><?php echo $row->waktu ?></td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="deleteReg('<?php echo $row->no_antrian ?>')"><i class="cil-trash"></i></button>
                            <?php
                            if ($row->status == 0): ?>
                                <button class="btn btn-sm btn-success" onclick="completeReg('<?php echo $row->no_antrian ?>')"><i class="cil-check"></i></button>
                            <?php
                            else: ?>
                                <button class="btn btn-sm btn-light" disabled><i class="cil-check"></i></button>
                            <?php
                            endif; ?>
                        </td>
                    </tr>
                <?php
                endwhile;
            endif;
            ?>
            </tbody>
        </table>
    </div>
</div>