<?php
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = "SELECT * FROM karyawan WHERE id = ?";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if (isset($row['id'])) {
?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=home"> Home</li></a>
                        <li class="breadcrumb-item"><a href="?page=karyawanread">Karyawan</li></a>
                        <li class="breadcrumb-item active">Riwayat Bagian</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Riwayat Bagian</h3>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="nik">Nomor Induk Karyawan</label>
                    <input type="text" class="form-control" name="nik" value="<?php echo $row['nik'] ?>" disabled>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="handphone">Handphone</label>
                    <input type="text" class="form-control" name="handphone" value="<?php echo $row['handphone'] ?>" disabled>
                </div>
                </div>
                <a href="?page=lokasiread" class="btn btn-danger btn-sm float-right ml-2">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" class="btn btn-success btn-sm float-right" name="button_create">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
            </div>
        </div>
    </section>
<?php
    } else {
        echo "<meta http-equiv='refresh' content='0;url=?page=karyawanread'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=karyawanread'>";
}