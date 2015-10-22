<?php
	class DaoSlide extends CI_Model{

		public function DaoSlide(){
			parent::__construct();

			$this->load->database();
			$this->load->model('dto/Dtoslide');
		}
		/*
		type
			slide
			sub slide
			partner
			feature
		*/
		public function addSlide(DtoSlide $s){
			$this->db->trans_begin();
			$slide = array(
							"userid"	=>	$s->getUserid(),
							"ordering"	=>	$s->getOrdering(),
							"type"		=>	$s->getType(),
							"linkto"	=>	$s->getLinkto()
						);
			$this->db->insert("SLIDERS",$slide);
			$sliderid = $this->db->insert_id();
			
			foreach($s->getSliderdetail() as $slider){
				$slider["sliderid"] = $sliderid;
				$this->db->set('createddate', 'NOW()', FALSE);
				$this->db->insert("SLIDERDETAIL",$slider);
			}
			if($this->db->trans_status()===FALSE){
				$this->db->trans_rollback();
				return FALSE;
			}else{
				$this->db->trans_commit();
				return TRUE;
			}
		}

		public function getAllSlides(){
			$this->db->select('s.sliderid, s.ordering, s.type, sd.title, sd.languageid, sd.caption, sd.description, sd.imageurl');
			$this->db->from('SLIDERS s');
			$this->db->join('SLIDERDETAIL sd', 's.sliderid = sd.sliderid');
			$this->db->where('sd.languageid',2);
			$this->db->order_by('s.ordering', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function getfrontSlides($type, $langid){
			$this->db->select('s.sliderid, s.ordering, s.type, sd.title, sd.languageid, sd.caption, sd.description, sd.imageurl');
			$this->db->from('SLIDERS s');
			$this->db->join('SLIDERDETAIL sd', 's.sliderid = sd.sliderid');
			$this->db->where('sd.languageid', $langid);
			$this->db->where('s.type', $type);
			$this->db->order_by('s.ordering', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function getSlide($id){
			$this->db->select('s.sliderid, s.linkto, s.ordering, s.type, sd.title, sd.languageid, sd.caption, sd.description, sd.imageurl');
			$this->db->from('SLIDERS s');
			$this->db->join('SLIDERDETAIL sd', 's.sliderid = sd.sliderid');
			$this->db->where('s.sliderid',$id);
			$this->db->order_by('s.ordering', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function updateSlide(DtoSlide $s){
			$this->db->trans_begin();
			$slide = array(
					"userid"	=>	$s->getUserid(),
					"ordering"	=>	$s->getOrdering(),
					"type"		=>	$s->getType(),
					"linkto"	=>	$s->getLinkto()
				);
			$this->db->where('sliderid', $s->getSlideid());
			$this->db->update('SLIDERS', $slide);
			$sid = $s->getSlideid();
			foreach($s->getSliderdetail() as $sl){
				$this->db->where('sliderid',$sid);
				$this->db->where('languageid', $sl['languageid']);
				$this->db->update('SLIDERDETAIL', $sl);
			}
			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return FALSE;
			}else{
				$this->db->trans_commit();
				return TRUE;
			}
		}

		public function deleteSlide($sliderid){
		$this->db->where('sliderid', $sliderid);
		$this->db->delete('SLIDERDETAIL');
		$this->deleteMainSlider($sliderid);

		}
		public function deleteMainSlider($sid){
			$this->db->where('sliderid', $sid);
			$this->db->delete('SLIDERS');
		}
		
		public function getRecentSlides($limit){
			$this->db->select('s.sliderid,sd.imageurl , sd.title, sd.description, sd.createddate');
			$this->db->from('SLIDERS s');
			$this->db->join('SLIDERDETAIL sd','s.sliderid = sd.sliderid');
			$this->db->limit($limit);
			$this->db->where('languageid', 2);
			$this->db->order_by('sliderid','DESC');
			$query = $this->db->get();
			return $query->result();
		}

		public function showSlide(){
			$this->db->select('S.sliderid,S.title');
			$this->db->from('SLIDERS S');
			$this->db->where('S.languageid', lang('lang_id'));
			$this->db->order_by('S.sliderid', 'DESC');
			$query = $this->db->get();
			return 	$query->result();
		}

	}

	


?>