<div class="my-3">
    <h1><?= (isset($data)) ? 'Edit' : 'Tambah'; ?> Data Langganan</h1>
    <br>

    <?= (isset($data['langgananId'])) ? form_open('/langganan/edit/' . $data['langgananId']) : form_open('/langganan/tambah'); ?>

    <div class="form-group">
        <label for="langgananid">Id Langganan</label>
        <input required type="number" class="form-control" name="langgananid" id="langgananid" value="<?= (isset($data['langgananId']) ? $data['langgananId'] : '') ?>" placeholder="Ketik Id Langganan disini...">
    </div>

    <!-- Untuk Pelanggan -->
    <div class="form-group">
        <label for="pelangganid">Pelanggan</label>
        <select required class="form-control" name="pelangganid" id="pelangganid">
            <?php
            foreach ($pelanggan as $pel) {
            ?>
                <option value="<?= $pel['pelangganId'] ?>" <?= (isset($data['pelangganId']) && $data['pelangganId'] == $pel['pelangganId']) ? 'selected' : '' ?>><?= $pel['pelangganId'] . ' - ' . $pel['nama'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <!-- Untuk Paket -->
    <div class="form-group">
        <label for="paketid">Paket</label>
        <select required class="form-control" name="paketid" id="paketid">
            <?php
            foreach ($paket as $pak) {
            ?>
                <option value="<?= $pak['paketId'] ?>" <?= (isset($data['paketId']) && $data['paketId'] == $pak['paketId']) ? 'selected' : '' ?>><?= $pak['paketId'] . ' - ' . $pak['nama_paket'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <!-- tanggal -->
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" value="<?= (isset($data['tanggal'])) ? $data['tanggal'] : '' ?>" class="form-control" required name="tanggal" id="tanggal" placeholder="Pilih Tanggal">
    </div>

    <button type="submit" class="btn btn-primary">Kirim</button>

    </form>
</div>