<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>kd_buku</th>
            <th>judul</th>
            <th>pengarang</th>
            <th>penerbit</th>
            <th>kota_terbit</th>
            <th>tahun_terbit</th>
            <th>ISBN</th>
            <th>asal</th>
            <th>kd_klasifikasi</th>
            <th>tanggal_terima</th>
            <th>jenis</th>
            <th>rak</th>
            <th>stok</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $export) { ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $export['kd_buku'] ?></td>
                <td><?php echo $export['judul'] ?></td>
                <td><?php echo $export['pengarang'] ?></td>
                <td><?php echo $export['penerbit'] ?></td>
                <td><?php echo $export['kota_terbit'] ?></td>
                <td><?php echo $export['tahun_terbit'] ?></td>
                <td><?php echo $export['ISBN'] ?></td>
                <td><?php echo $export['asal'] ?></td>
                <td><?php echo $export['klasifikasi'] ?></td>
                <td><?php echo $export['tgl_diterima'] ?></td>
                <td><?php echo $export['jenis'] ?></td>
                <td><?php echo $export['rak'] ?></td>
                <td><?php echo $export['stok'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>