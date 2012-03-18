<h2>Schoolsass</h2>

<?php 
	print_r($objects);
	foreach ($objects as $object){


		$this->render_view('_item', array('locals' => array('object' => $object)));

	}
?>
<?php echo $this->pagination(); ?>