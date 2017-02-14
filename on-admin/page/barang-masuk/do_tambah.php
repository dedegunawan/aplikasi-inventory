<?php
//validation
use Illuminate\Validation\DatabasePresenceVerifier;
$test_translation_path = BASE_PATH.'/lang';
$test_translation_locale = 'id';
//var_dump('unique:'.(new DataBarang)->getTable().',kode_barang');die();
$ob_data_barang = DataBarang::select('kode_barang')->get()->pluck('kode_barang')->implode(',');
$test_input_rules = [
    'kode_barang' => 'required|in:'.$ob_data_barang,
    'qty' => 'required|integer',
    'tanggal' => 'required|date|date_format:Y-m-d',
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
            $barang_masuk = new BarangMasuk;
            $barang_masuk->kode_barang = $_POST['kode_barang'];
            $barang_masuk->qty = $_POST['qty'];
            $barang_masuk->tanggal = $_POST['tanggal'];
            $barang_masuk->save();
            echo "Berhasil Menambah Data Barang";
            echo "<script>window.location.href = '".admin_page('barang-masuk')."';</script>";
        } catch (Exception $e) {
            echo "Gagal Memasukkan Data Barang, ";
            echo "<script>window.location.href = '".admin_page('barang-masuk', 'tambah')."';</script>";
        }

}
else {
    if (!isset($_SESSION['forms'])) {
        $_SESSION['forms']=array();
    }
    $_SESSION['forms'] = array_merge($_SESSION['forms'], $_POST);
    $_SESSION['errors'] = $validator->errors();
    header("Location:".admin_page('barang-masuk', 'tambah'));
}
