<?php include ('public_header.php'); ?>
<div class = "container"><!--50-->
	<h1>Search Results</h1><!--50-->
	<hr><!--50-->
	<table class = "table"><!--50-->
		<thead><!--50-->
			<tr><!--50-->
				<th>Sr. No.</th><!--50-->
				<th>Article Title</th><!--50-->
				<th>Published On</th><!--50-->
			</tr><!--50-->
		</thead><!--50-->
		<tbody><!--50-->
			<?php /*50*/
				if (count($articles)) : /*50*/
				$count = $this->uri->segment(4,0); /*50*/
				foreach ($articles as $article) : /*50*/
				?><!--50-->
				<tr><!--50-->
					<td><?= ++$count ?></td><!--50-->
					<td><?= $article->title ?></td><!--50-->
					<!--td><!--?= article->created_at ?></td><!--50,53-->
					<td><?= date('d M y H:i:s', strtotime($article->created_at)); ?></td><!--53, to change the date's formate-->
				</tr><!--50-->
				<?php endforeach; ?><!--50-->
				<?php else : ?><!--50-->
				<tr><!--50-->
					<td colspan = "3">
						No Records Found!
					</td><!--50-->
				</tr><!--50-->
			<?php endif ;?><!--50-->
		</tbody><!--50-->
	</table><!--50-->
	<?= $this->pagination->create_links(); ?><!--52-->
	<!--?= $this->pagination->create_links(); ?><!--51-->
</div><!--50-->
<?php include ('public_footer.php'); ?>
