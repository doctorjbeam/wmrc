<?php
	ini_set("display_errors", "off");
	#error_reporting(E_ALL);
	
	//get the image variables from the url
	$image_source = base64_decode($_GET['image']);
	$image_source = htmlspecialchars_decode($image_source);
	$image_source = str_replace(" ", "%20", $image_source);
	
	$filename = $_GET['image'];
	
	#print_r($_SERVER); die;
	
	if (file_exists("./thumbs/" . $filename)) {
		#echo file_get_contents("./thumbs/" . $filename); 
		#die;
	}


	//$max_width and $max_height are the maximum width and height of the image
	
	$max_width	= isset($_GET['w']) ? $_GET['w'] : 200;
	$max_height	= isset($_GET['h']) ? $_GET['h'] : 200;
	
	//if there is an image
	
	if ($image_source != "") {
		//the parameters for the image
		$image_params = image_type($image_source);
		
		//create the image resource
		$im = $image_params[1]($image_source);

		if (!$im) { /* See if it failed */
			$im	= imagecreatetruecolor(150, 30); /* Create a black image */
			$bgc = imagecolorallocate($im, 255, 255, 255);
			$tc	= imagecolorallocate($im, 0, 0, 0);
			imagefilledrectangle($im, 0, 0, 150, 30, $bgc);
			/* Output an errmsg */
			imagestring($im, 3, 5, 5, "Error loading $imgname", $tc);
		}
	
		//width and height of the image
		$width	= imagesx($im);
		$height = imagesy($im);
		
		if ($height > $width) {
			$w_ratio = $width / $max_width; 
			$h_ratio = $height / $max_height;
			
			$heig	= $max_height;
				
			//resize the height proportionately
			$wid	= floor($width / $h_ratio);
			$chng	= 1;
		} elseif ($width > $max_width) {
			//ratio to maximum width and height
			//the larger ratio is the one that needs to be resized
			
			$w_ratio = $width / $max_width; 
			$h_ratio = $height / $max_height;
			
			$wid	= $max_width;
				
			//resize the height proportionately
			$heig	= floor($height / $w_ratio);
			$chng	= 1;
		} else {
			$wid	= $width;
			$heig	= $height;
		}
		
		//if the sizes needed resizing
		if ($chng == 1) {
			//create a new image resource
		
			$resize_img = imagecreatetruecolor($wid,$heig);
			
			//fill the image with white
			$white = imagecolorallocate($resize_img,255,255,255);
			imagefilledrectangle($resize_img,0,0,$wid,$heig,$white);
			
			//copy the original image to the new image resource with the new size
			imagecopyresampled($resize_img,$im,0,0,0,0,$wid,$heig,$width,$height);
			
			//headers
			header($image_params[0]);
			
			//send the image
			$image_params[2]($resize_img);
		
			#file_put_contents("./thumbs/" . $filename, $image_params[0].$image_params[2]($resize_img));
			
			//destroy the image
			imagedestroy($im);
			imagedestroy($resize_img);
		} else {
			//headers
			header($image_params[0]);
			
			//send the image
			$image_params[2]($im);
			
			//destroy the image
			//modified thanks to randy's comment
			imagedestroy($im);
		}
	}
	
	
	/*
		Creates an array of image values used above
		$image_params[0] - the image headers
		$image_params[1] - Creates the image
		$image_params[2] - displays the image 
	*/
	
	function image_type($v){
		//find the filetype
		$type = strtolower(strrchr($v,"."));
	
		//depending what image file is used - different params are needed
		switch($type){
			case'.jpg':
			$image_params = array("Content-type:image/jpeg",
									"imagecreatefromjpeg","imagejpeg");
			break;
			
			case'.jpeg':
			$image_params = array("Content-type:image/jpeg",
									"imagecreatefromjpeg","imagejpeg");
			break;
	
			case'.gif':
			$image_params = array("Content-type:image/gif",
									"imagecreatefromgif","imagegif");
			break;
	
			case'.png':
			$image_params = array("Content-type:image/png",
									"imagecreatefrompng","imagepng");
			break;
		}
		
		//return the image paramaters array
		return($image_params);
	}
?>
