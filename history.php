<?php
  include('koneksi.php');
    include('header.php');
    ?>

    <body>
      <!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: olive;
      }
    h2 {
        text-transform: uppercase;
        color: olive;
      }
    h3 {
        text-transform: uppercase;
        color: olive;
      }
    h5 {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: olive;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: olive;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    a {
          background-color: olive;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
     
    <center><h2>CARI SISWA BERDASARKAN NISN</h2></center>
    
    <form action="" method="get">
  <table class="table">
    <tr>
      <td>NISN</td>
      <td>:</td>
      <td>
        <input class="form-control" type="text" name="nisn">
      </td>
      <td>
        <button class="btn btn-primary" type="submit" name="cari">Cari</button></td>
</tr>
    </table> 
  </form>
    
    
    
     
<?php 
if (isset($_GET['nisn']) && $_GET['nisn'] != ''){
  $query= mysqli_query ($koneksi,"SELECT * FROM siswa WHERE nisn = '$_GET[nisn]'");
  $data = mysqli_fetch_array($query);
  $nisn = $data['nisn'];

?>
<div class="panel panel-info">
</div>
  <div class="panel-heading">
    <table class="table table-bordered table-striped"> 
<center><h3>Biodata Siswa</h3></center>
</div>
<div class="panel panel-body"></div> 
<thead>
    <tr>
      <th scope="col"><b>NISN</b></th>
      <td scope="col"><b>NAMA</b></td>
      <th scope="col"><b>ID KELAS</b></th>
      </tr>
      
      <tbody>

      <td><?php echo $data['nisn']; ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo $data['id_kelas']; ?></td>
      </table>  
      </thead>
      </tbody>
      
    
    <div>
    </div>

      <div class="panel panel-info">
      </div>
      <div class="panel-heading">
      <center><h3>Tagihan SPP Siswa</h3></center>
      </div>
      <div class="panel-body "></div>
      <table class="table table-bordered table-striped">
        <thead>
      <tr>
      <th scope="col">ID Pembayaran</th>
      <th scope="col">ID Petugas</th>
      <th scope="col">NISN</th>
      <th scope="col">Tanggal Bayar</th>
      <th scope="col">Bulan Bayar</th>
      <th scope="col">Tahun Bayar</th>
      <th scope="col">ID SPP</th>
      <th scope="col">Jumlah</th>
      
        </tr>
        </thead>
          
    
  <tbody>
    <?php
    $query= mysqli_query($koneksi ," SELECT * FROM pembayaran WHERE nisn = '$data[nisn]' ORDER BY jumlah_bayar ASC ");
    
  while($data= mysqli_fetch_assoc($query))
  {
  echo" 
      
       <tr>
          <td>{$data['id_pembayaran']}</td>
           <td>{$data['id_petugas']}</td>
          <td>{$data['nisn']}</td>
          <td>{$data['tgl_bayar']}</td>
          <td>{$data['bulan_dibayar']}</td>
          <td>{$data['tahun_dibayar']}</td>
          <td>{$data['id_spp']}</td>
          <td>{$data['jumlah_bayar']}</td>
          </tr>";
        }
          
         ?>
       </table>
       </tbody>
<?php
}
?>

</body>