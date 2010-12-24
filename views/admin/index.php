<?php if (!empty($members)): ?>
	<h3><?php echo lang('members_title');?></h3>
	<?php echo form_open('admin/members/action'); ?>
		<table border="0" class="table-list">
			<thead>
				<tr>
					<th><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
					<th><?php echo lang('members_first_name');?></th>
					<th><?php echo lang('members_last_name');?></th>
					<th><?php echo lang('members_address');?></th>
					<th><?php echo lang('members_city');?></th>
					<th><?php echo lang('members_actions_label');?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($members as $member): ?>
					<tr>
						<td align="center"><?php echo form_checkbox('action_to[]', $member->id); ?></td>
						<td><?php echo anchor('admin/members/edit/' . $member->id, $member->first_name); ?></td>
						<td><?php echo anchor('admin/members/edit/' . $member->id, $member->last_name); ?></td>
						<td><?php echo $member->address; ?></td>
						<td><?php echo $member->city; ?></td>
						
						<td>
							<?php echo anchor('admin/members/edit/' . $member->id, lang('user_edit_label'), array('class'=>'minibutton')); ?>  
							<?php echo anchor('admin/members/delete/' . $member->id, lang('user_delete_label'), array('class'=>'confirm minibutton')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>	
		</table>
	<div class="float-right">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )); ?>
	</div>
<?php else: ?>
	<div class="blank-slate">
	
		<img src="<?php echo site_url('system/pyrocms/modules/users/img/user.png') ?>" />
		
		<h2><?php echo lang('members_no_members');?></h2>
	</div>
<?php endif; ?>
