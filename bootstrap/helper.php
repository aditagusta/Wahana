<?php
	function ResponseOk($data)
	{
		return array(
			"status" => true,
			"data" => $data
		);
	}
	function ResponseError($data)
	{
		return array(
			"status" => false,
			"data" => $data
		);
	}
