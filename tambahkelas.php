<?php
include_once('config.php');
if(isset($_POST['simpan'])){
    extract($_POST);
    $ins = mysqli_query($conn, "insert into tbkelas values(null, '$nama_kelas','$jurusan')");
    if($ins){
        ?>
        <script>
            alert('simpan berhasil');
            location.href = '?hal=tampilkelas';
            </script>
            <?php
    }
}
?>
<a href="?hal=tampilkelas">Kembali Ke Tampil Kelas</a>
<br>
<br>
<form action="?hal=tambahkelas" method="post">
    <table>
        <tr>
            <td>Nama Kelas</td>
            <td>
                <input type="text" name="nama_kelas" placeholder="Nama Kelas" required>
</td>
</tr>
<tr>
    <td>Jurusan</td>
    <td>
        <select name="jurusan" required>
            <option value="">==pilih jurusan==</option>
            <option value="RPL">Rekayasa Perangkat Lunak</option>
            <option value="DKV">Desain Komunikasi Visual</option>
            <option value="MP">Manajemen Perkantoran</option>
            <option value="AK ">Akuntasi</option>
            <option value="BD">Bisnin Digital</option> 
</select>
</td>
</tr>
<tr>
    <td>
        <button type="submit" name="update" value="simpan">Simpan</button>
</td>
<td>
    <button type="reset">Reset</button>
</td>
</tr>
</table>

</form>