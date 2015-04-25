<?php  


public function create_thumb($path_img, $width=300, $height=0, $square=TRUE,$ext_thumb='_thumb'){

	$config['image_library'] 	= 'gd2';
	$config['source_image'] 	= $path_img; 
	$config['create_thumb'] 	= TRUE;
	$config['thumb_marker']		= $ext_thumb;	// file-name_thumb.jpg
	if($square==TRUE){
		$config['maintain_ratio']	= TRUE;		// maintain ratio or square
	}else{
		$config['maintain_ratio']	= FALSE;
	}
	
	$config['width']         	= $width;		// thumb with
	$config['height']       	= $height;		// height (just important for square thumbnails)

	$this->load->library('image_lib', $config);

	if($this->image_lib->resize()){
		$this->image_lib->clear();
		return "Thumb created.";
	}else{
		$this->image_lib->clear();
		return "Error on thumbnail creation".$this->image_lib->display_errors();
	}

}

//USE: $this->create_thumb($path_img, $width=300, $height=0, $square=TRUE,$ext_thumb='_thumb');



?>