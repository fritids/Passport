<?php
MvcRouter::public_connect('{:controller}', array('action' => 'index'));
MvcRouter::public_connect('{:controller}/{:id:[\d]+}', array('action' => 'show'));
MvcRouter::public_connect('{:controller}/{:action}');

MvcRouter::public_connect('nomads/schools/add', array('controller' => 'nomads', 'action' => 'schools_add'));
?>