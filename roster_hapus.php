<?php
include "koneksi.php";
$kode = $_GET['id'];

mysqli_query($conn,"delete from tb_jadwal where id_jadwal = '$kode'") or die (mysqli_error($conn));
?>
<script type="text/javascript">
alert("Data berhasil dihapus")
window.location="inde.php?page=lihatroster";
</script>