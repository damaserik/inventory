SELECT barang_keluar.`tgl_keluar` AS tanggal,kagrup.`nama_kagrup`,mtc.`nama_mtc`,barang_keluar.`total_harga_keluar` AS total_biaya
FROM kagrup,mtc,barang_keluar
WHERE barang_keluar.`id_kagrup`=kagrup.`id_kagrup` AND barang_keluar.`id_mtc`=mtc.`id_mtc`