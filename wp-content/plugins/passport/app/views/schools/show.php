<h2><?php echo $object->name; ?></h2>
 
<div>
    <?php echo $this->html->link('Website', $object->url); ?>
</div>
 
<?php
    echo '<div>'.$object->address1.'</div>';
    if (!empty($object->address2)) {
        echo '<div>'.$object->address2.'</div>';
    }
   
?>
 
<p>
    <?php echo $this->html->link('All Schools', array('controller' => 'schools')); ?>
</p>