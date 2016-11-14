<?php	
		
	//Set images folder. (optional parameter)
	define("FOLDER_IMAGES","images");
	
	//Set cache folder. (must parameter)
	define("FOLDER_CACHE","cache");	

	//Set jpeg quality 
	define("JPEG_QUALITY","90");
	
	//set image not found filepath. a must parameter. Output this image in case the image not found.
	define("FILEPATH_IMAGE_NOT_FOUND","images_system/image_not_found.jpg");
	
	
	//--------------------------------------------------------------------
	
	require_once 'get_image.class.php';
	
	//set defines data
	$getImage = new GetImage();
	$getImage->setImagesFolder(FOLDER_IMAGES);
	$getImage->setCacheFolder(FOLDER_CACHE);
	$getImage->setErrorImagePath(FILEPATH_IMAGE_NOT_FOUND);
	$getImage->setJpegQuality(JPEG_QUALITY);
	
	//validate "img"
	if(!isset($_GET["img"])){
		echo "Image not found, please use format like: <b>getimage.php?img=pic.jpg</b>";
		exit();
	}
	
	//set image url
	$img = $_GET["img"];
	
	//set widht and height
	$width = -1;
	$width = isset($_GET["w"])?$_GET["w"]:-1;
	$height = isset($_GET["h"])?$_GET["h"]:-1;
	
	//set type
	$type = "";
	if(isset($_GET["exact"])) $type = GetImage::TYPE_EXACT;
	else if(isset($_GET["exacttop"])) $type = GetImage::TYPE_EXACT_TOP;
	
	//call show image function
	$getImage->showImage($img,$width,$height,$type);
	
?>