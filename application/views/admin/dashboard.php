<?php include('admin_header.php');?>

<div class = "container">
	<div class = "row">
		<div class = "col-lg-6 col-lg-offset-6">
			<?= anchor('admin/store_article', 'Add Article', ['class'=>'btn btn-primary pull-right'])?>
			<!--a href = "<?= base_url('public/add_article')?>" class = "btn btn-primary pull-right">Add Article</a-->
		</div>
	</div>
	<?php if ($feedback = $this->session->flashdata('feedback')):
			$feedback_class = $this->session->flashdata('feedback_class'); ?><!--39-->
	<!-- execute if flashdata is set, which is specifies in the login page-->
	<div class = "row"><!--39-->
		<div class = "col-lg-6 col-lg-offset-3">
			<div class = "alert alert-dismissible <?= $feedback_class ?>"><!--39-->
				<?= $feedback ?><!--39-->
			</div>
		</div>
	</div>
	<?php endif;?><!--39-->
	<table class = "table">
		<thead><tr>
			<th>Sr.No.</th>
			<th>Title</th>
			<th>Action</th></tr>
		</thead>
		<tbody>
		<?php /* if (count ($articles)): */?><!--49-->
		<?php /* foreach ($articles as $article): */ ?><!--49-->
		<?php /*49*/
			if (count($articles)): /*49*/
			$count = $this->uri->segment(3, 0);/*49 if segment is null then it will considre second parameter's value*/
			foreach ($articles as $article): /*49*/
		?><!--49-->
			<tr>
				<!--td>1</td--><!--49-->
				<td><?= ++$count ?></td><!--49-->
				<!--td>Article Title</td-->
				
				
				<td><?= $article->title ?></td>
				
				<td><!--45-->
					<div class = "row"><!--45-->
						<div class = "col-lg-2"><!--45-->
							<?= anchor("admin/edit_article/{$article->id}", 'Edit', ['class'=>'btn btn-primary'])?><!--40--><!--45-->
						</div><!--45-->
						<div class = "col-lg-2"><!--45-->
						<?=
							form_open('admin/delete_article'),/*45*/
							form_hidden('article_id', $article->id),/*45*/
							form_submit(['name'=>'submit', 'value'=>'Delete', 'class'=>'btn btn-danger']),/*45*/
							form_close();/*45*/
							?><!--45-->
						</div><!--45-->
					</div><!--45-->
					
					<!--a class = "btn btn-primary">Edit</a--> <!--40-->
					
					<!--a class = "btn btn-danger">Delete</a--><!--45-->
				</td>
			</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan = "3">
					No Records Found!
				<td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>
	<?= $this->pagination->create_links(); ?><!--47-->
</div>

<?php include ('admin_footer.php');?>
