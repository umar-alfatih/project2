<?php
include "koneksi.php";
$kode = @$_GET['id'];

mysqli_query($conn,"delete from tb_kelas where id_kelas = '$kode'") or die (mysqli_error($conn));
?>
<script type="text/javascript">
alert("Data berhasil dihapus")
window.location="inde.php?page=kelas";
</script>