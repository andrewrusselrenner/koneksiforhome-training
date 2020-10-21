<h1>Data Pelanggan</h1>
<br>
<a name="tambahdata" id="tambahdata" class="btn btn-primary shadow mb-2" href="/pelanggan/tambah" role="button">+ Tambah Data</a>

<table class="table">
    <thead>
        <tr>
            <th>Pelanggan Id</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $d) {
        ?>
            <tr>
                <td scope="row"><?= $d['pelangganId']; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['jenis_kelamin']; ?></td>
                <td><?= $d['alamat']; ?></td>
                <td><?= $d['telpon']; ?></td>
                <td>
                    <a name="edit<?= $d['pelangganId']; ?>" id="edit<?= $d['pelangganId']; ?>" class="btn btn-secondary" href="/pelanggan/edit/<?= $d['pelangganId']; ?>" role="button">Edit</a>
                    <button id="hapus<?= $d['pelangganId']; ?>" name="hapus<?= $d['pelangganId']; ?>" type="button" class="btn btn-danger" onclick="hapusdata('<?= $d['pelangganId']; ?>')">Hapus</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    function hapusdata(id) {
        confirm('Yakin ingin dihapus') ? window.location.href = '<?= base_url('/pelanggan/hapus') ?>/' + id : '';
    }
</script>