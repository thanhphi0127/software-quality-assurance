<style>
	tieude{
		font-weight:bold;
	}
	table tr td{
		border:none !important;
	}
	table{
		border:none !important;
	}
</style>
<table>
	<?php foreach ($dsgopy as $row){?>
	<tr>
		<td> <?php echo '<tieude>'.$row['USERNAME'].'</tieude>, '.$row['THOIGIAN'];?></td>
	</tr>
	<tr>
		<td> <?php echo $row['NOIDUNG'];?></td>
	</tr>
	<?php }?>
	
</table>