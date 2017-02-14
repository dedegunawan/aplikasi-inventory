<?php
//validation
use Illuminate\Validation\DatabasePresenceVerifier;
$test_translation_path = BASE_PATH.'/lang';
$test_translation_locale = 'id';
//var_dump('unique:'.(new DataBarang)->getTable().',kode_barang');die();
$ob_id_barang_keluar = BarangKeluar::select('id_barang_keluar')->get()->pluck('id_barang_keluar')->implode(',');
$test_input_rules = [
    'id_barang_keluar' => 'required|integer|in:'.$ob_id_barang_keluar,
];


$translation_file_loader = new Illuminate\Translation\FileLoader(new Illuminate\Filesystem\Filesystem, $test_translation_path);

$translator = new Illuminate\Translation\Translator($translation_file_loader, $test_translation_locale);

$validation_factory = new Illuminate\Validation\Factory($translator);
$capsule = $GLOBALS['capsule'];
$presence = new DatabasePresenceVerifier($capsule->getDatabaseManager());
$validation_factory->setPresenceVerifier($presence);
$validator = $validation_factory->make($_GET, $test_input_rules);


if (
    !$validator->fails()
    ){
        try {
            $barang_keluar = BarangKeluar::find($_GET['id_barang_keluar']);
            $barang_keluar->tanggal_penarikan = date('Y-m-d');
            $barang_keluar->save();
            echo "Berhasil Mengembalikan Barang";
            echo "<script>window.location.href = '".admin_page('barang-keluar')."';</script>";
        } catch (Exception $e) {
            echo "Gagal Mengembalikan Barang, ";
            echo "<script>window.location.href = '".admin_page('barang-keluar', 'tambah')."';</script>";
        }

}
else {
    if (!isset($_SESSION['forms'])) {
        $_SESSION['forms']=array();
    }
    $_SESSION['forms'] = array_merge($_SESSION['forms'], $_POST);
    $_SESSION['errors'] = $validator->errors();
    header("Location:".admin_page('barang-keluar', 'index'));
}
