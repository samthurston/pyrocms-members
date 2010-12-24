<h3><?php echo lang('members_title'); ?></h3>

<?php echo form_open('admin/members/'.$method, 'class="crud"'); ?>
	
	<ol>
		<li class="even">
			<label for="first_name"><?php echo lang('members_first_name'); ?></label>
			<?php echo form_input( array(
			      'name'        => 'first_name',
			      'id'          => 'first_name',
			      'value'       => $member->first_name,
			      'maxlength'   => '64',
			      'size'        => '20',
			   
			    ) ); ?>
			    <span class="required-icon tooltip"><?php echo lang('required_label');?></span>
		</li>
		<li>
			<label for="last_name"><?php echo lang('members_last_name'); ?></label>
			<?php echo form_input( array(
			      'name'        => 'last_name',
			      'id'          => 'last_name',
			      'value'       => $member->last_name,
			      'maxlength'   => '64',
			      'size'        => '20',
			   
			    ) ); ?>
			    <span class="required-icon tooltip"><?php echo lang('required_label');?></span>
		</li>
		<li class="even">
			<label for="firm"><?php echo lang('members_firm'); ?></label>
			<?php echo form_input( array(
			      'name'        => 'firm',
			      'id'          => 'firm',
			      'value'       => $member->firm,
			      'maxlength'   => '64',
			      'size'        => '20',
			   
			    ) ); ?>
			
		</li>
		<li>
			<label for="address"><?php echo lang('members_address');?></label>
			<?php echo form_input( array(
			      'name'        => 'address',
			      'id'          => 'address',
			      'value'       => $member->address,
			      'maxlength'   => '64',
			      'size'        => '20'
			    ) ); ?>
		</li>
		<li class="even">
			<label for="city"><?php echo lang('members_city');?></label>
			<?php echo form_input( array(
			      'name'        => 'city',
			      'id'          => 'city',
			      'value'       => $member->city,
			      'maxlength'   => '64',
			      'size'        => '20'
			   
			    ) ); ?>
		</li>
		<li>
			<label for="state"><?php echo lang('members_state');?></label>
			<?php echo form_input( array(
			      'name'        => 'state',
			      'id'          => 'state',
			      'value'       => $member->state,
			      'maxlength'   => '4',
			      'size'        => '3',
			      'style'	=> 'width: 24px;'
			   	
			    ) ); ?>
		</li>
		<li class="even">
			<label for="zip"><?php echo lang('members_postal');?></label>
			<?php echo form_input( array(
			      'name'        => 'zip',
			      'id'          => 'zip',
			      'value'       => $member->zip,
			      'maxlength'   => '10',
			      'size'        => '10',
			      'style'	=> 'width: 80px;'
			    ) ); ?>
		</li>
		<li>
			<label for="phone"><?php echo lang('members_phone');?></label>
			<?php echo form_input( array(
			      'name'        => 'phone',
			      'id'          => 'phone',
			      'value'       => $member->phone,
			      'maxlength'   => '12',
			      'size'        => '12',
			      'style'	=> 'width: 96px;'
			    ) ); ?>
		</li>
		<li class="even">
			<label for="email"><?php echo lang('members_email');?></label>
			<?php echo form_input( array(
			      'name'        => 'email',
			      'id'          => 'email',
			      'value'       => $member->email,
			      'maxlength'   => '256',
			      'size'        => '24'
			    ) ); ?>
		</li>
		
	</ol>
	<div class="float-right">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
	</div>
	<?php echo form_hidden('id',$member->id) ?>
<?php echo form_close(); ?>
