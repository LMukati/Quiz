<?php

$config = array(

		'loginuser'=>	array(
						array(
															'field'	=>	'email',
															'label'	=>	'email',
															'rules'	=>	'required|trim|valid_email'
														),
														array(
															'field'	=>	'password',
															'label'	=>	'password',
															'rules'	=>	'required'
														)
									)


);