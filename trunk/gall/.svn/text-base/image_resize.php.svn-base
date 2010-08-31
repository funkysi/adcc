<?php
function image_resize($width,$height,$path,$image)
	{
		#include $_SERVER["DOCUMENT_ROOT"].'/include/config.php'; 
		$IMAGE_BASE = $_SERVER["DOCUMENT_ROOT"];
		$MAX_WIDTH = $width;
		$MAX_HEIGHT = $height;

		# Get image location
		$image_file = str_replace('..', '', $image);
		$image_file = str_replace('%20', ' ', $image_file);
		$image_path = $IMAGE_BASE . "$image_file";
		$newpath = str_replace('photos',$path,$image_path);
		# Load image
		$img = null;
		$ext = strtolower(end(explode('.', $image_path)));
		if ($ext == 'jpg' || $ext == 'jpeg') 
		{
		    $img = @imagecreatefromjpeg($image_path);
		} 
		else if ($ext == 'png') 
		{
		    $img = @imagecreatefrompng($image_path);
			# Only if your version of GD includes GIF support
		} 
		else if ($ext == 'gif') 
		{
		    $img = @imagecreatefrompng($image_path);
		}

		# If an image was successfully loaded, test the image for size
		if ($img) 
		{
		    # Get image size and scale ratio
		    $width = imagesx($img);
		    $height = imagesy($img);
		    $scale = min($MAX_WIDTH/$width, $MAX_HEIGHT/$height);

		    # If the image is larger than the max shrink it
		    if ($scale < 1) 
			{
		        $new_width = floor($scale*$width);
		        $new_height = floor($scale*$height);

		        # Create a new temporary image
		        $tmp_img = imagecreatetruecolor($new_width, $new_height);

		        # Copy and resize old image into new image
		        imagecopyresampled($tmp_img, $img, 0, 0, 0, 0,
		                         $new_width, $new_height, $width, $height);
		        imagedestroy($img);
		        $img = $tmp_img;	
		    }
		}

		# Create error image if necessary
		if (!$img) 
		{
		    $img = imagecreate($MAX_WIDTH, $MAX_HEIGHT);
		    imagecolorallocate($img,255,255,255);
		    $c = imagecolorallocate($img,255,255,255);
		    imageline($img,0,0,$MAX_WIDTH,$MAX_HEIGHT,$c);
		    imageline($img,$MAX_WIDTH,0,0,$MAX_HEIGHT,$c);
		}

		imagejpeg($img,$newpath,100);	
	}
?>