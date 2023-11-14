<?php 
include_once('config.php');
$kelas = mysqli_query($conn, "select * from tbkelas");

?>

<table>
    <tr>
        <td>Tahun</td>
        <td>
            <select id="tahun" required>
            <option value="">==pilih tahun==</option>
                                <option value="2023/2024">2023/2024</option>
                                <option value="2024/2025">2024/2025</option>
                                <option value="2025/2026">2025/2026</option>
</select>
</td>
</tr>
<tr>
<td>Bulan</td>
<td>
    <select id="bulan" required>
        <option value="">==pilih bulan==</option>
        <option value="1">januari</option>
        <option value="2">februari</option>
        <option value="3">maret</option>
        <option value="4">april</option>
        <option value="5">mei</option>
        <option value="6">juni</option>
        <option value="7">juli</option>
        <option value="8">agustus</option>
        <option value="9">september</option>
        <option value="10">oktober</option>
        <option value="11">november</option>
        <option value="12">desember</option>
</select>
</td>
</tr>
<tr>
    <td>Kelas</td>
    <td>
        <select id="kelas" required>
            <option value="">==pilih kelas==</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
            <?php 
            $no=1;
            while($row=mysqli_fetch_array($kelas)){
                ?>
                <option value="<?=$row['idkelas']?>"><?=$row['nama_kelas']?></option>
                <?php 
            }
            ?>
            </select>
        </td>
        <tr>
            <td>
                <button onclick="cetak();" id="cetak">Cetak</button>
        </td>
        </tr>
        </table>
        <script>
            function cetak(){
                var tahun = document.getElemenById('tahun').value;
                var bulan = document.getElemenById('bulan').value;
                var kelas = document.getElemenById('kelas').value;
                window.open('cetak.php?tahun='+tahun+'&bulan='+bulan+'&kelas='+kelas,'_blank',"toolbar=yes,scrollbars=yes,resizable=yes,top=0,left=0,width=1000,height=1000");
            }
            </script> 