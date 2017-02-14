<?php
//validation
use Illuminate\Validation\DatabasePresenceVerifier;
$test_translation_path = BASE_PATH.'/lang';
$test_translation_locale = 'id';
//var_dump('unique:'.(new DataBarang)->getTable().',kode_barang');die();
$test_input_rules = [
    'kode_barang' => 'required|unique:'.(new DataBarang)->getTable().',kode_barang,'.@$_POST['kode_barang'].',kode_barang',
    'nama_barang' => 'required',
    'id_jenis_barang' => 'required|in:'.MasterJenisBarang::select('id_jenis_barang')->get()->pluck('id_jenis_barang')->implode(','),
    'id_satuan' => 'required|in:'.MasterSatuan::select('id_satuan')->get()->pluck('id_satuan')->implode(','),
    'stok_maksimum' => 'required|numeric',
    'stok_minimum' => 'required|numeric',
];


$translation_file_loader = new Illuminate\Translation\FileLoader(new Illuminate\Filesystem\Filesystem, $test_translation_path);

$translator = new Illuminate\Translation\Translator($translation_file_loader, $test_translation_locale);

$validation_factory = new Illuminate\Validation\Factory($translator);
$capsule = $GLOBALS['capsule'];
$presence = new DatabasePresenceVerifier($capsule->getDatabaseManager());
$validation_factory->setPresenceVerifier($presence);
$validator = $validation_factory->make($_POST, $test_input_rules);


if (
    !$validator->fails()
    ){
        try {
            $data_barang = DataBarang::find($_POST['kode_barang']);
            $data_barang->nama_barang = $_POST['nama_barang'];
            $data_barang->id_jenis_barang = $_POST['id_jenis_barang'];
            $data_barang->id_satuan = $_POST['id_satuan'];
            $data_barang->stok_maksimum = $_POST['stok_maksimum'];
            $data_barang->stok_minimum = $_POST['stok_minimum'];
            $data_barang->save();
            echo "Berhasil Mengubah Data Barang";
            echo "<script>window.location.href = '".admin_page('data-barang')."';</script>";
        } catch (Exception $e) {
            echo "Gagal Mengubah Data Barang, ";
            echo "<script>window.location.href = '".admin_page('data-barang', 'tambah')."';</script>";
        }

}
else {
    if (!isset($_SESSION['forms'])) {
        $_SESSION['forms']=array();
    }
    $_SESSION['forms'] = array_merge($_SESSION['forms'], $_POST);
    $_SESSION['errors'] = $validator->errors();
    header("Location:".admin_page('data-barang', 'tambah'));
}
