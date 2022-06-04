SELECT barang.`id_barang`,barang.`nama_barang`, SUM(barang_masuk.`stok_masuk`) AS NB_masuk, 
SUM(stok_barang.`stok_out`) AS NB_pakai, SUM(stok_barang.`stok`) AS sisa
FROM barang,stok_barang,barang_masuk
WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_transaksi`=barang_masuk.`id_transaksi`
AND stok_barang.`id_bagian`='Shtl2' AND stok_barang.tanggal BETWEEN '2019-06-01' AND '2019-07-20'
GROUP BY id_barang
UNION ALL
SELECT "" AS id_barang,
	"Grand Total" AS nama_barang,
SUM(barang_masuk.`stok_masuk`) AS NB_masuk, 
SUM(stok_barang.`stok_out`) AS NB_pakai, SUM(stok_barang.`stok`) AS sisa
FROM barang,stok_barang,barang_masuk
WHERE barang.`id_barang`=stok_barang.`id_barang` AND stok_barang.`id_transaksi`=barang_masuk.`id_transaksi`
AND stok_barang.`id_bagian`='Shtl2' AND stok_barang.tanggal BETWEEN '2019-05-01' AND '2019-05-20'