<h1>Data Langganan</h1>
<br>
<a name="tambahdata" id="tambahdata" class="btn btn-primary shadow mb-2" href="/langganan/tambah" role="button">+ Tambah Data</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Paket Id</th>
            <th>Pelanggan Id</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $d) {
        ?>
            <tr>
                <td scope="row"><?= $d['langgananId']; ?></td>
                <td><?= $d['paketId'] . ' - ' . $d['nama_paket']; ?></td>
                <td><?= $d['pelangganId'] . ' - ' . $d['nama']; ?></td>
                <td><?= $d['tanggal']; ?></td>
                <td>
                    <a name="edit<?= $d['langgananId']; ?>" id="edit<?= $d['langgananId']; ?>" class="btn btn-secondary" href="/langganan/edit/<?= $d['langgananId']; ?>" role="button">Edit</a>
                    <button id="hapus<?= $d['langgananId']; ?>" name="hapus<?= $d['langgananId']; ?>" type="button" class="btn btn-danger" onclick="hapusdata('<?= $d['langgananId']; ?>')">Hapus</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    function hapusdata(id) {
        confirm('Yakin ingin dihapus') ? window.location.href = '<?= base_url('/langganan/hapus') ?>/' + id : '';
    }
</script>