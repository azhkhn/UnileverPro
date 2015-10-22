<?php

class DaoProduct extends CI_Model{

	public function DaoCategory(){
		parent::__construct();
		$this->load->model("dto/DtoProduct");
	}

	public function lstProduct($langid,$productid){
		$this->db->select('p.productid , p.price, p.recommend, p.seotitle , p.seodescription ,  p.thumbnailurl, 
						   cd.categoryid , cd.title as categoryname ,
						   u.userid , u.username ,  
						   d.title,d.caption,d.description,d.createddate');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL d', 'p.productid = d.productid');
		$this->db->where('d.languageid',$langid);
		$this->db->join('CATEGORIES c', 'p.categoryid = c.categoryid');
		$this->db->join('CATEGORYDETAIL cd', 'cd.categoryid = c.categoryid');
		$this->db->where('cd.languageid',$langid);
		$this->db->join('USERS u', 'p.userid = u.userid');
		$this->db->order_by("p.productid", "desc");
		if($productid != 0){
			$this->db->where('p.productid',$productid);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function listProducts($limit, $offset){
		$this->db->select('p.productid , p.price, p.recommend, p.seotitle , p.seodescription ,  p.thumbnailurl, 
						   cd.categoryid , cd.title as categoryname ,
						   u.userid , u.username ,  
						   d.title,d.caption,d.description,d.createddate');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL d', 'p.productid = d.productid');
		$this->db->where('d.languageid',lang("lang_id"));
		$this->db->join('CATEGORIES c', 'p.categoryid = c.categoryid');
		$this->db->join('CATEGORYDETAIL cd', 'cd.categoryid = c.categoryid');
		$this->db->where('cd.languageid', lang("lang_id"));
		$this->db->join('USERS u', 'p.userid = u.userid');
		$this->db->order_by("p.productid", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllProductCount($categoryID=0){
		$this->db->from("PRODUCTS");
		if($categoryID!=0){
			$this->db->where("categoryid",$categoryID);
		}
		return $this->db->count_all_results();
	}
	
	public function getProduct($productid){
		$this->db->select('d.languageid,d.title,d.caption,d.description , p.productid,p.seotitle,p.seodescription, p.price, p.recommend, p.categoryid,p.thumbnailurl ');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL d', 'p.productid = d.productid');
		$this->db->where('p.productid',$productid);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function addNewProduct(DtoProduct $products){
		$this->db->trans_begin();
		$product = array(
						"categoryid" => $products->getCategoryid(),
						"userid" => $products->getUserid(),
						"seotitle" => $products->getSeotitle(),
						"seodescription" => $products->getSeodescription(),
						"thumbnailurl" => $products->getThumbnailurl(),
				        "price"  => $products->getPrice(),
						"recommend"  => $products->getRecommend()
					);
		$this->db->insert("PRODUCTS",$product);
		$productID = $this->db->insert_id();
		
		foreach($products->getProductDetails() as $pro){
			$pro["productid"] = $productID;
			$this->db->insert("PRODUCTDETAIL",$pro);
		}
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			
			$this->db->trans_commit();
			return $productID;
		}
	}
	
	public function deleteProduct($productid){
		$this->db->trans_begin();
	
		// DELETE ALL DETAILS
		$this->db->where('productid', $productid);
		$this->db->delete('PRODUCTDETAIL');
	
		// DELETE MAIN
		$this->db->where('productid', $productid);
		$this->db->delete('PRODUCTS');
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	public function updateProduct(DtoProduct $products){
		$productID = $products->getProductid();
		$this->db->trans_begin();
		$product = array(
				"categoryid" => $products->getCategoryid(),
				"userid" => $products->getUserid(),
				"seotitle" => $products->getSeotitle(),
				"seodescription" => $products->getSeodescription(),
				"thumbnailurl" => $products->getThumbnailurl(),
				"price"  => $products->getPrice(),
				"recommend"  => $products->getRecommend()
		);
		$this->db->where("productid", $productID);
		$this->db->update("PRODUCTS",$product);
		
		
		foreach($products->getProductDetails() as $pro){
			$pro["productid"] = $productID;
			$this->db->where('productid', $productID);
			$this->db->where('languageid', $pro['languageid']);
			$this->db->update("PRODUCTDETAIL",$pro);
		}
		if($this->db->trans_status()===FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
		
	}
	
	public function countProducts(){
		return $this->db->count_all('PRODUCTS');
	}

	public function getRecentProducts($limit){
		$this->db->select('pd.productid,pd.description , pd.title, pd.caption, pd.createddate, p.thumbnailurl , p.price,p.recommend');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL pd','p.productid = pd.productid');
		$this->db->limit($limit);
		$this->db->order_by('productid','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
		public function getRecentProductsByLanguage($limit){
		return $this->getProductByOrderAndLimit($limit,'productid');
	}

	public function getPopularProductsByLanguage($limit){
		return $this->getProductByOrderAndLimit($limit,'count');
	}

	public function getRecommendProductsByLanguage($limit){
		return $this->getProductByOrderAndLimit($limit,'recommend');
	}

	public function getProductByOrderAndLimit($limit,$order_by)	{
		$this->db->select('pd.productid,pd.description , p.categoryid, pd.title, pd.caption, pd.createddate, p.thumbnailurl, p.price , p.recommend');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL pd','p.productid = pd.productid');
		$this->db->where("pd.languageid", lang('lang_id'));
		if($order_by=="recommend"){
			$this->db->where("recommend",1);
		}
		$this->db->limit($limit);
		$this->db->order_by($order_by,'DESC');
		$query = $this->db->get();
		return $query->result();		
	}
	
	
	public function increaseCount($id){
		$sql = "UPDATE PRODUCTS SET count=count+1 WHERE productid=".$id;
		$this->db->query($sql);
	}
	
	public function getPopularProduct($limit){
		$this->db->select('p.productid , p.price, p.recommend, p.seotitle , p.seodescription ,  p.thumbnailurl,
						   cd.categoryid , cd.title as categoryname ,
						   u.userid , u.username ,
						   d.title,d.caption,d.description,d.createddate');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL d', 'p.productid = d.productid');
		$this->db->where('d.languageid',lang('lang_id'));
		$this->db->join('CATEGORIES c', 'p.categoryid = c.categoryid');
		$this->db->join('CATEGORYDETAIL cd', 'cd.categoryid = c.categoryid');
		$this->db->where('cd.languageid',lang('lang_id'));
		$this->db->join('USERS u', 'p.userid = u.userid');
		$this->db->limit($limit);
		$this->db->order_by("p.count", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function lstRelatedProduct($limit ,$proid, $cateid){
		$this->db->select('p.productid , p.price, p.recommend, p.seotitle , p.seodescription ,  p.thumbnailurl,
						   cd.categoryid , cd.title as categoryname ,
						   u.userid , u.username ,
						   d.title,d.caption,d.description,d.createddate');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL d', 'p.productid = d.productid');
		$this->db->where('d.languageid',lang('lang_id'));
		$this->db->join('CATEGORIES c', 'p.categoryid = c.categoryid');
		$this->db->join('CATEGORYDETAIL cd', 'cd.categoryid = c.categoryid');
		$this->db->where('cd.languageid',lang('lang_id'));
		/*$this->db->where('p.categoryid', $cateid );*/
		$this->db->where('(p.categoryid = '.$cateid.' OR p.categoryid IN (SELECT subof FROM CATEGORIES WHERE categoryid = '.$cateid.'))');
		$this->db->where('p.productid <>', $proid);
		$this->db->join('USERS u', 'p.userid = u.userid');
		$this->db->limit($limit);
		$this->db->order_by("p.count", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function lstRecentProduct($limit){
		$this->db->select('p.productid , p.price, p.recommend, p.seotitle , p.seodescription ,  p.thumbnailurl,
						   cd.categoryid , cd.title as categoryname ,
						   u.userid , u.username ,
						   d.title,d.caption,d.description,d.createddate');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL d', 'p.productid = d.productid');
		$this->db->where('d.languageid',lang('lang_id'));
		$this->db->join('CATEGORIES c', 'p.categoryid = c.categoryid');
		$this->db->join('CATEGORYDETAIL cd', 'cd.categoryid = c.categoryid');
		$this->db->where('cd.languageid',lang('lang_id'));
		$this->db->join('USERS u', 'p.userid = u.userid');
		$this->db->limit($limit);
		$this->db->order_by("p.count", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function lstProductByCate($cateid,$limit,$offset){
		$this->db->select('p.productid , p.price, p.recommend, p.seotitle , p.seodescription ,  p.thumbnailurl,
						   cd.categoryid , cd.title as categoryname ,
						   u.userid , u.username ,
						   d.title,d.caption,d.description,d.createddate');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL d', 'p.productid = d.productid');
		$this->db->where('d.languageid',lang('lang_id'));
		$this->db->join('CATEGORIES c', 'p.categoryid = c.categoryid');
		$this->db->join('CATEGORYDETAIL cd', 'cd.categoryid = c.categoryid');
		$this->db->where('cd.languageid',lang('lang_id'));
		$this->db->join('USERS u', 'p.userid = u.userid');
		$this->db->order_by("p.productid", "desc");
		$this->db->where('(p.categoryid = '.$cateid.' OR p.categoryid IN (SELECT subof FROM CATEGORIES WHERE categoryid = '.$cateid.'))');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function lstProductByName($search,$limit,$offset){
		$this->db->select('p.productid , p.price, p.recommend, p.seotitle , p.seodescription ,  p.thumbnailurl,
						   cd.categoryid , cd.title as categoryname ,
						   u.userid , u.username ,
						   d.title,d.caption,d.description,d.createddate');
		$this->db->from('PRODUCTS p');
		$this->db->join('PRODUCTDETAIL d', 'p.productid = d.productid');
		$this->db->where('d.languageid',lang('lang_id'));
		$this->db->join('CATEGORIES c', 'p.categoryid = c.categoryid');
		$this->db->join('CATEGORYDETAIL cd', 'cd.categoryid = c.categoryid');
		$this->db->where('cd.languageid',lang('lang_id'));
		$this->db->join('USERS u', 'p.userid = u.userid');
		$this->db->order_by("p.productid", "desc");
		$this->db->like('d.title', $search);
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllProductsCountByName($search){
		$this->db->distinct("productid");
		$this->db->from("PRODUCTDETAIL");
		$this->db->where("languageid",lang('lang_id'));
		$this->db->like("title", $search);
		return $this->db->count_all_results();
	}
	
	
}

?>