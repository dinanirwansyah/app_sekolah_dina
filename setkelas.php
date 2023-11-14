<?php
include_once('config.php');
$sql = mysqli_query($conn, "select * from tbsiswa where id NOT IN (select idsiswa from tbsetkelas where tahun = '2023/2024')");
$kelas = mysqli_query($conn, "select * from tbkelas order by nama_kelas asc");
$setkelas = mysqli_query($conn, "select a.nama_siswa, b.nama_kelas, c.tahun from tbsiswa a, tbkelas b, tbsetkelas c where a.id=c.idsiswa AND b.idkelas order by b.nama_kelas, a.nama_siswa asc");
?>

<div style="width: 48%;min-height:300px;fload:left; padding-left:5px;">
<h3 style="color:red;"> Siswa Belum Punya Kelas</h3>
<from action="?hal=proses_set_kelas" method="post">
    <table>
        <?php
        while($row = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="siswa[<?=$row['id']?>]"value="<?=$row['id']?>">
        </td>
        </tr>
        <?php 
        }
        ?>
        </table>
        <table>
            <tr>
                <td>
                    <select name="kelas" required>
                        <option value="">==pilih kelas==</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
                        <?php
                        while($baris=mysqli_fetch_array($setkelas)){
                            echo "<option value='$baris[idkelas]'$baris[nama_kelas]</option>";
                        }
                        ?>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="tahun" requerired>
                                <option value="">==pilih tahun==</option>
                                <option value="2023/2024">2023/2024</option>
                                <option value="2024/2025">2024/2025</option>
                                <option value="2025/2026">2025/2026</option>
                    </select>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="tambah">Tambahkan</button>
                    </td>
                    </tr>
                    </table>
                    </form>
                    </div>

                    <div style="width: 48%;min-height:300px;float:left;padding-left:5px;">
                    <h3 style="color:green;"> Siswa Sudah Punya Kelas</h3>
                    <table border="1" width="100%" cellspacing=0 cellpadding=0>
                        <tr>
                             <th>Kelas</th>
                             <th>Nama Siswa</th>
                             <th>Tahun</th> 
                    </tr>
                    <?php
                    while($data=mysqli_fetch_array($setkelas)){
                         ?>
                         <tr>
                             <td><?=$data['nama_kelas']?></td>
                             <td><?=$data['nama_siswa']?></td>
                             <td><?=$data['tahun']?></td>
                     </tr>
                     <?php
                    } 
?>
</table>
                    </div>