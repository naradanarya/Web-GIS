<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title ?></title>
<style type="text/css" media="screen">
body {
background-color: #EEE;
font-family: Arial;
}
.container {
width: 80%;
padding: 20px;
background-color: #fff;
min-height: 300px;
margin: 40px auto;
border-radius: 10px;
}
table {
border: solid thin #000;
border-collapse: collapse;
width: 100%;
}
tr {
border-collapse: collapse;
}
td,th {
padding: 6px 12px;
border-bottom: solid thin #EEE;
text-align: left;
}
</style>
</head>
<body>
<div class="container">
<h1><?php echo $title ?></h1>
<p><a href="<?php echo base_url() ?>backend/download/export">Export ke Excel</a></p>
<table>
<thead>
<tr>
<th>NAMA SPBU</th>
<th>Latitude</th>
<th>Longitude</th>
</tr>
</thead>
<tbody>
<?php foreach($datapoint as $datapoint) { ?>
<tr>
<td><?php echo $datapoint->nama_spbu ?></td>
<td><?php echo $datapoint->latitude ?></td>
<td><?php echo $datapoint->longitude ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html>