SELECT barang_keluar.`id_transaksi`,barang.`id_barang`,barang.`nama_barang`,barang_keluar.`tgl_keluar`, stok_keluar,total_harga_keluar AS total_harga
FROM barang_keluar,dtl_barang_keluar,barang
WHERE barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` AND dtl_barang_keluar.`id_barang`=barang.`id_barang` AND barang_keluar.`id_bagian`='Shtl2'
GROUP BY id_transaksi
UNION ALL
SELECT "" AS id_transaksi,""AS id_barang, "" AS nama_barang, ""AS tgl_keluar, 
       "Grand Total" AS stok_keluar,
	SUM(sub_harga)AS total_harga
FROM barang_keluar,dtl_barang_keluar,barang
WHERE barang_keluar.`id_transaksi`=dtl_barang_keluar.`id_transaksi` AND dtl_barang_keluar.`id_barang`=barang.`id_barang` AND barang_keluar.`id_bagian`='Shtl2'

