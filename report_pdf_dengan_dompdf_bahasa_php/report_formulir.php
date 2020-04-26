<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($conn, "select * from formulir");
$html = '<center><h3>Formulir Peserta Didik</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
    <tr>
        <td>No</td>
        <td>input</td>
        <td>nama</td>
        <td>jk</td>
        <td>nisn</td>
        <td>nik</td>
        <td>tempatlahir</td>
        <td>tanggallahir</td>
        <td>nomorakta</td>
        <td>agama</td>
        <td>negara</td>
        <td>kebutuhankhusus</td>
        <td>alamat</td>
        <td>rt</td>
        <td>rw</td>
        <td>dusun</td>
        <td>desa</td>
        <td>kecamatan</td>
        <td>kp</td>
        <td>lintang</td>
        <td>bujur</td>
        <td>temting</td>
        <td>modtrans</td>
        <td>kks</td>
        <td>anakke</td>
        <td>pekps</td>
        <td>kps</td>
    </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
        <td>" . $no . "</td>
        <td>" . $row['input'] . "</td>
        <td>" . $row['nama'] . "</td>
        <td>" . $row['jk'] . "</td>
        <td>" . $row['nisn'] . "</td>
        <td>" . $row['nik'] . "</td>
        <td>" . $row['tempatlahir'] . "</td>
        <td>" . $row['tanggallahir'] . "</td>
        <td>" . $row['nomorakta'] . "</td>
        <td>" . $row['agama'] . "</td>
        <td>" . $row['negara'] . "</td>
        <td>" . $row['kebutuhankhusus'] . "</td>
        <td>" . $row['alamat'] . "</td>
        <td>" . $row['rt'] . "</td>
        <td>" . $row['rw'] . "</td>
        <td>" . $row['dusun'] . "</td>
        <td>" . $row['desa'] . "</td>
        <td>" . $row['kecamatan'] . "</td>
        <td>" . $row['kp'] . "</td>
        <td>" . $row['lintang'] . "</td>
        <td>" . $row['bujur'] . "</td>
        <td>" . $row['temting'] . "</td>
        <td>" . $row['modtrans'] . "</td>
        <td>" . $row['kks'] . "</td>
        <td>" . $row['anakke'] . "</td>
        <td>" . $row['pekps'] . "</td>
        <td>" . $row['kps'] . "</td>
</tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A1', 'potrait');
$dompdf->render();
$dompdf->stream('laporan_formulir_peserta_didik.pdf');
