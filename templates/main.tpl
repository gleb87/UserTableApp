<div class="container">
	<?php if (!empty($result)) { ?>
	<div class="alert alert-success">
  		<?php echo $result; ?>
	</div>
	<?php } ?>
	<table class="table">
		<thead>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user) { ?>
				<tr>
					<td><?php echo $user['firstname'] ?></td>
					<td><?php echo $user['lastname'] ?></td>
					<td><?php echo $user['email'] ?></td>
					<td>
						<div class="btn-group">
						  <a href="/index.php?route=<?php echo $route; ?>&action=<?php echo $action_edit; ?>&id=<?php echo $user['id']; ?>" class="btn btn-primary"><?php echo $button_edit; ?></a>
						  <a href="/index.php?route=<?php echo $route; ?>&action=<?php echo $action_delete; ?>&id=<?php echo $user['id']; ?>" class="btn btn-danger"><?php echo $button_delete; ?></a>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<a href="/index.php?route=<?php echo $route; ?>&action=<?php echo $action_add; ?>" class="btn btn-primary"><?php echo $button_add ?></a>
</div>
