<div class="my-3">
    <h1><?= (isset($edit)) ? 'Edit' : 'Tambah'; ?> Data Pelanggan</h1>
    <br>

    <?= (isset($edit)) ? form_open('/pelanggan/edit/' . $data['pelangganId']) : form_open('/pelanggan/tambah'); ?>
    <div class="form-group">
        <label for="pelangganid">Id Pelanggan</label>
        <input required type="text" class="form-control" value="<?= (isset($edit)) ? $data['pelangganId'] : '' ?>" name="pelangganid" id="pelangganid" placeholder="Contoh P1">
    </div>

    <div class="form-group">
        <label for="nama">Nama Pelanggan</label>
        <input required type="text" value="<?= (isset($edit)) ? $data['nama'] : '' ?>" class="form-control" name="nama" id="nama" placeholder="Ketik nama pelanggan...">
    </div>

    <div class="form-group">
        <label for="jeniskelamin">Jenis Kelamin</label>
        <select required class="form-control" name="jeniskelamin" id="jeniskelamin">
            <option value="Laki-Laki" <?= (isset($data) && $data['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : '' ?>>Laki-Laki</option>
            <option value="Perempuan" <?= (isset($data) && $data['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea required class="form-control" name="alamat" id="alamat" rows="3"><?= (isset($edit)) ? $data['alamat'] : ''; ?></textarea>
    </div>

    <div class="form-group">
        <label for="telpon">Telpon</label>
        <input required type="number" value="<?= (isset($edit)) ? $data['telpon'] : ''; ?>" class="form-control" name="telpon" id="telpon" placeholder="Ketik nomor telpon">
    </div>

    <button type="submit" class="btn btn-primary">Kirim</button>

    </form>
</div>