<?php  
class ControllerCommonHomeFooter extends Controller {
	protected function index() {
			$this->load->model('catalog/information');
		$this->load->model('catalog/infocategory');
		$this->load->model('tool/image');
		$this->data['about_informations'] = array();
		$about_informations_category = $this->model_catalog_infocategory->getCategory(1);
		//print_r( $about_informations_category );
		$width = 200;  $height = 200;
		if($about_informations_category)
		{
			if ($about_informations_category['image']) {
				$image ='image/'.$about_informations_category['image'];// $this->model_tool_image->resize($about_informations_category['image'], $width, $height);
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg',$width, $height); // customized by rajasekar. false; 
			}
			 
      		$this->data['about_informations'][] = array(
        		'title' => $about_informations_category['name'],
        		'image' => $image ,
	    		'href'  => $this->url->link('information/infocategory', 'icpath=' . $about_informations_category['category_id'])
      		);
		}
		 $infocategory = $this->model_catalog_infocategory->getCategories(0);
		 
		 $mycategory = array();
		 foreach( $infocategory as $in_infocategory){
		 $mycategory[] = $in_infocategory['category_id'];
		 }
		 // print_r( $mycategory); //Array([0] => 1 [1] => 5  [2] => 3  [3] => 6  [4] => 8  [5] => 4  [6] => 7);
		  $this->data['about_informations_placeholder'] =  array();
	 	/*************/	 	  
		if(  $this->model_catalog_information->getInformationsByCategoryId($mycategory[0])->num_rows   ):
			foreach ($this->model_catalog_information->getInformationsByCategoryId($mycategory[0])->rows as $result) {

					$about_informations_child[$result['information_id']] = array(
						'information_id'=>$result['information_id']
						,'category_id'=>$result['category_id']
					);
					if($result['information_id'] == '14' || $result['information_id'] == '16'):
					$this->data['about_informations_placeholder'][] = array('href' =>$this->url->link('information/information', 'information_id=' . $result['information_id']));
					endif;
					
				} 
		endif;
		 $this->data['about_informations_child'] = (!empty($about_informations_child)) ? $about_informations_child: array();
 	/*************/	 
		$this->data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$this->data['informations'][] = array(
				'information_id'=>$result['information_id'],
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
    	}
 
 	/*************/	  
		if(  $this->model_catalog_information->getInformationsByCategoryId($mycategory[2])->num_rows   ):
			foreach ($this->model_catalog_information->getInformationsByCategoryId($mycategory[2])->rows as $result) {
					$text_whybuy[$result['information_id']] = array(
						'information_id'=>$result['information_id']
						,'category_id'=>$result['category_id']
					);
				} 
		endif;
		 $this->data['text_whybuy_informations'] = (!empty($text_whybuy)) ? $text_whybuy: array();
		//  $text_service_title =  $this->model_catalog_infocategory->getCategory($mycategory[2]);
		// $this->data['text_service'] =  $text_service_title['name'];
		 	$text_service_category = $this->model_catalog_infocategory->getCategory($mycategory[2]);
			$height =145;
		if($text_service_category)
		{
			if ($text_service_category['image']) {
				$image ='image/'.$text_service_category['image']; //$this->model_tool_image->resize($text_service_category['image'], $width, $height);
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg',$width, $height); // customized by rajasekar. false; 
			}
			
      		$this->data['text_service'][] = array(
        		'title' => $text_service_category['name'],
        		'image' => $image ,
        		'width' => $width ,
        		'height' => $height ,
	    		'href'  => $this->url->link('information/infocategory', 'icpath=' . $text_service_category['category_id'])
      		);
		}
	/*************/	   
	/****** Loyalty coding Start******/
		/*	if(  $this->model_catalog_information->getInformationsByCategoryId($mycategory[4])->num_rows   ):
			foreach ($this->model_catalog_information->getInformationsByCategoryId($mycategory[4])->rows as $result) {
					$text_loyalty[$result['information_id']] = array(
						'information_id'=>$result['information_id']
						,'category_id'=>$result['category_id']
					);
				} 
		endif;
		 $this->data['text_loyalty_informations'] = (!empty($text_loyalty)) ? $text_loyalty: array();
		 	$text_loyalty_category = $this->model_catalog_infocategory->getCategory($mycategory[4]);
			$height =145;
		if($text_loyalty_category)
		{
			if ($text_loyalty_category['image']) {
				$image = 'image/'.$text_loyalty_category['image']; 
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg',$width, $height); 
			}
			
      		$this->data['text_loyalty'][] = array(
        		'title' => $text_loyalty_category['name'],
        		'image' => $image ,
        		'width' => $width ,
        		'height' => $height ,
	    		'href'  => $this->url->link('information/infocategory', 'icpath=' . $text_loyalty_category['category_id'])
      		);
		}*/
		/****** Loyalty coding End******/
		
		/****** Fresh gridning coding Start******/
		
		
		if(  $this->model_catalog_information->getInformationsByCategoryId($mycategory[8])->num_rows   ):
		foreach ($this->model_catalog_information->getInformationsByCategoryId($mycategory[8])->rows as $result) {
			$text_freshgrid[$result['information_id']] = array(
					'information_id'=>$result['information_id']
					,'category_id'=>$result['category_id']
			);
		}
		endif;
		$this->data['text_loyalty_informations'] = (!empty($text_loyalty)) ? $text_loyalty: array();
		$text_loyalty_category = $this->model_catalog_infocategory->getCategory($mycategory[8]);
		$height =145;
		if($text_loyalty_category)
		{
			if ($text_loyalty_category['image']) {
				$image = 'image/'.$text_loyalty_category['image']; 
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg',$width, $height); 
			}
				
			$this->data['text_loyalty'][] = array(
					'title' => $text_loyalty_category['name'],
					'image' => $image ,
					'width' => $width ,
					'height' => $height ,
					'href'  => $this->url->link('information/infocategory', 'icpath=' . $text_loyalty_category['category_id'])
			);
		}
			
		/*************/
		/****** Fresh gridning coding End******/
	
			if(  $this->model_catalog_information->getInformationsByCategoryId($mycategory[7])->num_rows   ):
			foreach ($this->model_catalog_information->getInformationsByCategoryId($mycategory[])->rows as $result) {
					$text_vertical[$result['information_id']] = array(
						'information_id'=>$result['information_id']
						,'category_id'=>$result['category_id']
					);
				} 
		endif;
		 $this->data['text_vertical_informations'] = (!empty($text_vertical)) ? $text_vertical: array();
		 // $text_service_title =  $this->model_catalog_infocategory->getCategory($mycategory[4]);
		// $this->data['text_vertical'] =  $text_service_title['name'];
		 	$text_vertical_category = $this->model_catalog_infocategory->getCategory($mycategory[7]);
			$height =145;
		if($text_vertical_category)
		{
			if ($text_vertical_category['image']) {
				$image = 'image/'.$text_vertical_category['image']; //$this->model_tool_image->resize($text_vertical_category['image'], $width, $height);
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg',$width, $height); // customized by rajasekar. false; 
			}
			
      		$this->data['text_vertical'][] = array(
        		'title' => $text_vertical_category['name'],
        		'image' => $image ,
        		'width' => $width ,
        		'height' => $height ,
	    		'href'  => $this->url->link('information/infocategory', 'icpath=' . $text_vertical_category['category_id'])
      		);
		}
	/********************/
		 
		$this->language->load('common/footer');
		
	$this->data['text_voucher'] = $this->language->get('text_Cards');
		$this->data['text_shop_now'] = $this->language->get('text_shop_now');
	$this->data['voucher'] = $this->url->link('account/voucher', '', 'SSL');
	/*************/	 
			if(  $this->model_catalog_information->getInformationsByCategoryId($mycategory[3])->num_rows   ):
			foreach ($this->model_catalog_information->getInformationsByCategoryId($mycategory[3])->rows as $result) {
					$text_shopnow[$result['information_id']] = array(
						'information_id'=>$result['information_id']
						,'category_id'=>$result['category_id']
					);
				} 
		endif;
		 $this->data['text_shopnow_informations'] = (!empty($text_shopnow)) ? $text_shopnow: array();
	/*************/	 
			 if (isset($this->request->get['route']) && $this->request->get['route'] =='product/category') {
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}
		
		if (isset($parts[0])) {
			$this->data['category_id'] = $parts[0];
		} else {
			$this->data['category_id'] = 0;
		}
		}else{
		$this->data['category_id'] = 0;
		}
			$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->data['categories'] = array();
		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			$total = $this->model_catalog_product->getTotalProducts(array('filter_category_id'  => $category['category_id']));

			$children_data = array();

			$children = $this->model_catalog_category->getCategories($category['category_id']);

			foreach ($children as $child) {
				$data = array(
					'filter_category_id'  => $child['category_id'],
					'filter_sub_category' => true
				);

				$product_total = $this->model_catalog_product->getTotalProducts($data);

				$total += $product_total;

				$children_data[] = array(
					'category_id' => $child['category_id'],
					'name'        => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $product_total . ')' : ''),
					'href'        => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])	
				);		
			}

			$this->data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name'        => $category['name'] . ($this->config->get('config_product_count') ? ' (' . $total . ')' : ''),
				'children'    => $children_data,
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
			);	
		}	
	/*************/	 
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/homefooter.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/homefooter.tpl';
		} else {
			$this->template = 'default/template/common/homefooter.tpl';
		}
		
		$this->render();
	}
}
?>
