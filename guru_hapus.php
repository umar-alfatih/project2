<?php
include "koneksi.php";
$kode = @$_GET['id'];
$a=mysqli_query($conn,"select nip from tb_guru where id_guru = '$kode'") or die (mysqli_error($conn));
$b=mysqli_fetch_array($a);

mysqli_query($conn,"delete from tb_pengguna where username=$b[nip]") or die (mysqli_error($conn));

mysqli_query($conn,"delete from tb_guru where id_guru = '$kode'") or die (mysqli_error($conn));
?>
<script type="text/javascript">
alert("Data berhasil dihapus")
window.location="inde.php?page=lihatguru";
</script>