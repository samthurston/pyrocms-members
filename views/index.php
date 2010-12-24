<h2 id="page_title"><?php echo lang('members_title');?></h2>

<?php if (!empty($members)): ?>
	<?php foreach($members as $member){ ?>
		<div class="member">
		<ol>
			<li class="name"><?php echo $member->last_name; ?>, <?php echo $member->first_name; ?></li>
			<?php if ($member->firm): ?>
			<li class="firm"><?php echo $member->firm; ?></li>
			<?php endif; ?>
			<li class="addr"><?php echo $member->address; ?></li>
			<li class="addr"><?php echo $member->city; ?>, <?php echo $member->state; ?> <?php echo $member->zip; ?></li>
			<?php if ($member->phone): ?>
			<li class="phone"><?php echo $member->phone ?></li>
			<?php endif; ?>
			<?php if ($member->email): ?>
			<li class="email"><?php echo $member->email ?></li>
			<?php endif; ?>
		</ol>
		</div>
	<?php } ?>
	<?php if(!empty($pagination['links'])): ?>
	
	<div class="paginate">
		<?php echo $pagination['links'];?>
	</div>
	
	<!-- Pages: </p> -->
	<?php endif; ?>
<?php else: ?>

<?php endif; ?>
