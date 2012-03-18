<h2>Schools</h2>

<?php 
	foreach ($objects as $object){

		//print_r($object);
		$this->render_view('_item', array('locals' => array('school' => $object)));

	}
?>
<?php echo $this->pagination(); ?>