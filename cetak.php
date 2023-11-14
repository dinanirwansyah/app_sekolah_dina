<?php 
include_once('config.php');
$tahun = isset($_GET['tahun'])?$_GET['tahun']:"";
$bulan = isset($_GET['bulsn'])?$_GET['bulan']:"";
$kelas = isset($_GET['kelas'])?$_GET['kelas']:"";
if($kelas !="" && $bulan != "" && $kelas !=""){
    $ambilkelas = mysqli_query($conn,"select * from tbkelas where idkelas=$kelas");
    $datakelas = mysqli_fetch_array($ambilkelas);
    $sql = mysqli_query($conn, "select * from tbkelas,b nama_kelas from tbsiswa a,tbkelas b, tbsetkelas c where a.id=c.idsiswa AND b.idkelas=$kelas order by a.nama_siswa ASC");
    $jumhari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
    $header = "";
    $data = "";
    for($i=1;$i<=$jumhari;$i++){
        $header = $header."<th width='2%'>$i</th>";
        $data = $data."<td>&nbsp;</td>";
    }
    ?> 
    <table>
        <tr>
            <td>kelas</td>
            <td>:</td>
            <td><?=$datakelas['nama_kelas']?></td>
</tr>
<tr>
    <td>Bulan</td>
    <td>:</td>
    <td>
        <?php 
        switch($bulan){
            case 1:
                echo "januari";
                break;
                case 1:
                    echo "februari";
                    break;
                    case 1:
                        echo "maret";
                        break;
                        case 1:
                            echo "april";
                            break;
                            case 1:
                                echo "mei";
                                break;
                                case 1:
                                    echo "juni";
                                    break;
                                    case 1:
                                        echo "juli";
                                        break;
                                        case 1:
                                            echo "agustus";
                                            break;
                                            case 1:
                                                echo "september";
                                                break;
                                                case 1:
                                                    echo "oktober";
                                                    break;
                                                    case 1:
                                                        echo "november";
                                                        break;
                                                        case 1:
                                                            echo "desember";
                                                            break;
        }
        ?>
        <?=$tahun?>
    </td>
    </tr>
    </table>
    <table border="1" cellspacing=0 cellpadding=0 width="100%">
    <tr>
        <th width="2%">No</th>
        <th>Nama Siswa</th>
        <?=$header?>
    </tr>
    <?php 
    $no=1;
    while($row=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td align="center"><?=$no++?></td>
            <td><?=$row['nama_siswa']?></td>
            <td><?=$data?>
    </tr>
    <?php
    }
    ?>
    </table>
    <?php
}else{
    echo"Data tidak dapat ditampilkan";
}
?>
<script>
    window.print();
    </script>