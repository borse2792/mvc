<table border="2"  >
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	if(isset($res) && $res!=null){
		foreach($res as $r){ ?>
		<tr>
			<td>
			<?php echo $r['id'];?>
			</td>
			<td>
			<?php echo $r['name'];?>
			</td>
			<td>
			<a href="index.php?action=edit&id=<?php echo $r['id'];?>">EDIT</a>
			<a href="index.php?action=delete&id=<?php echo $r['id'];?>">DELETE</a>
			</td>
		</tr>
		<?php 	}
	}
	?>
	</tbody>
</table>
<a href="index.php?action=add">ADD NEW</a>