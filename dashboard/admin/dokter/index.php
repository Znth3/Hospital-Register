<div class="card">
    <div class="card-header">List Semua Pendaftar</div>
    <div class="card-body">
        <!-- /.row--><br>
        <table id="table-daftar" class="table table-responsive-sm table-hover table-outline mb-0">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Dokter</th>
                <th class="text-center">Spesialis</th>
                <th class="text-center">Poliklinik</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT dokter.*, poli.nama_poli FROM mpsi.dokter join poli on dokter.id_poli = poli.id_poli";

            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while ($row = $result->fetch_object()):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td class="text-center"><?php echo $row->nama_dokter ?></td>
                        <td class="text-center"><?php echo $row->spesialis ?></td>
                        <td class="text-center"><?php echo $row->nama_poli ?></td>
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