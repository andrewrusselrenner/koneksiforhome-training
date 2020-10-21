<h1>Data Paket</h1>
<br>
<a name="tambahdata" id="tambahdata" class="btn btn-primary shadow mb-2" href="/paket/tambah" role="button">+ Tambah Data</a>

<table class="table">
    <thead>
        <tr>
            <th>Id Paket</th>
            <th>Nama Paket</th>
            <th>Internet</th>
            <th>UseeTV</th>
            <th>Kategori</th>
            <th>Price</th>
            <th>Pajak</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $d) {
        ?>
            <tr>
                <td scope="row"><?= $d['paketId']; ?></td>
                <td><?= $d['nama_paket']; ?></td>
                <td><?= $d['internet']; ?></td>
                <td><?= $d['useetv']; ?></td>
                <td><?= $d['kategori']; ?></td>
                <td>Rp. <?= $d['price']; ?></td>
                <td><?= $d['pajak']; ?>%</td>
                <td>
                    <a name="edit<?= $d['paketId']; ?>" id="edit<?= $d['paketId']; ?>" class="btn btn-secondary" href="/paket/edit/<?= $d['paketId']; ?>" role="button">Edit</a>
                    <button id="hapus<?= $d['paketId']; ?>" name="hapus<?= $d['paketId']; ?>" type="button" class="btn btn-danger" onclick="hapusdata('<?= $d['paketId']; ?>')">Hapus</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    function hapusdata(id) {
        confirm('Yakin ingin dihapus') ? window.location.href = '<?= base_url('/paket/hapus') ?>/' + id : '';
    }
</script>