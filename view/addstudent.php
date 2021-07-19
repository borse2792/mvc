<form method="post" action="index.php?action=insert"enctype="multipart/form-data">
	<table border="2">
		
		<tbody>
			<tr>
				<th>Name</th>
				<td>
				 <input type="text" name="name" required>
				</td>
			<tr>
			<tr>
				<th>File</th>
				<td>
				 <input type="file" name="image" accept="image/*" required>
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