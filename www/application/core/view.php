<?php

class View
{
	
	function generate($content_view, $data = null, $count = null)
	{
		include 'application/views/'.$content_view;
	}
}
