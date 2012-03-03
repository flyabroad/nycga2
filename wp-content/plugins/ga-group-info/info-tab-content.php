<?php
    global $bp;
    $data_store = groups_get_groupmeta( $bp->groups->current_group->id, $this->slug );
    
    // temp for figuring out how old contact info is stored
    $fields = json_decode( groups_get_groupmeta( $bp->groups->current_group->id, 'contact_fields' ) );
    print_r($fields);
    ?>
<div class="extra-data">
    <?php foreach ( $data_store as $slug => $data ) {
	if (!empty($data['value'])) :
	    $value = gait_htmlify( $data['value'] );
	    ?>
	    <h4><?php echo $data['name']; ?></h4>
	    <?php if ($data['type'] == 'multi-line') {
		gait_content($data['value']);
	    } else {
		echo '<p>' . $value . '</p>'; 
	    }
	endif;
    } ?>
</div>
<?php 