<div class="my-3">
    <h1><?= (isset($edit)) ? 'Edit' : 'Tambah' ?> Data Paket</h1>
    <br>

    <?= isset($edit) ? form_open('/paket/edit/' . $data['paketId']) : form_open('/paket/tambah') ?>
    <div class="form-group">
        <label for="paketid">Id Paket</label>
        <input type="text" class="form-control" value="<?= (isset($edit) ? $data['paketId'] : '') ?>" name="paketid" id="paketid" placeholder="Contoh PK1">
    </div>

    <div class="form-group">
        <label for="namapaket">Nama Paket</label>
        <input type="text" class="form-control" name="namapaket" id="namapaket" value="<?= (isset($edit)) ? $data['nama_paket'] : '' ?>" placeholder="Contoh: New Premium">
    </div>

    <div class="form-group">
        <label for="internet">Internet</label>
        <input type="text" class="form-control" name="internet" id="internet" value="<?= (isset($data)) ? $data['internet'] : '' ?>" placeholder="Contoh: 10Mbps">
    </div>

    <div class="form-group">
        <label for="useetv">UseeTV</label>
        <input type="text" class="form-control" name="useetv" id="useetv" value="<?= (isset($edit)) ? $data['useetv'] : '' ?>" placeholder="Contoh: Essential + OTT">
    </div>

    <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control" name="kategori" id="kategori" value="<?= (isset($edit)) ? $data['kategori'] : '' ?>" placeholder="Contoh: A10">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="price" value="<?= (isset($data['price'])) ? $data['price'] : '' ?>" placeholder="Ketih harga paket">
    </div>

    <div class="form-group">
        <label for="pajak">Pajak</label>
        <input type="number" class="form-control" name="pajak" id="pajak" value="<?= (isset($data['pajak'])) ? $data['pajak'] : '' ?>" placeholder="Ketik jumlah pajak disini...">
    </div>

    <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>