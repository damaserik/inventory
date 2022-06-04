SELECT stok_barang.id_barang,barang.`nama_barang`,tgl_masuk,stok_masuk AS barang_masuk,total_harga_masuk AS total_harga,penanggung_jawab
FROM barang_masuk,barang,stok_barang
WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_transaksi`=barang_masuk.`id_transaksi`