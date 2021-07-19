<form method="post" action="index.php?action=update">
	<table border="2">
		
		<tbody>
			<tr>
				<th>Name</th>
				<td>
				 <input type="text" name="name" value="<?php echo $res['name'];?>" required>
				 
				 
				 <input type="hidden" name="id" value="<?php echo $res['id'];?>"  required>
				</td>
			<tr>
			<tr><td></td>
				<td>
				 <input type="submit" name="submit" value="submit">
				</td>
			<tr>
		</tbody>
	</table>
</form>