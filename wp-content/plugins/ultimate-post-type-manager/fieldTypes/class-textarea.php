<?php 

class textarea extends fieldType{

	public function __construct($name,$label='',$desc='',$val='',$help='')
	{
		parent::__construct($name,$label,$desc,$val,$help);
		$this->ver = 1.0;
		$this->basic = true;
		$this->ftype = 'textarea';
		$this->flabel = 'Text Area';
		
	}
	public function input($post_id)
	{
		$val = get_post_meta($post_id, $this->name, TRUE);	
		$e="<label for='".$this->name."'>".$this->label."</label>";
		$e.="<p><textarea id='".$this->name."' name='xydac_custom[".$this->ftype."-".$this->name."]' >".$val[$this->ftype]."</textarea></p>";
		$e.="<p><span>".$this->desc."</span></p>";
		return $e;
	}
	
	public function saving(&$temp,$post_id,$val,$oval=null)
	{
		$val = esc_attr($val);
		$val = array( $this->ftype =>$val);
		array_push($temp,update_post_meta($post_id, $this->name, $val));
	}
	public function output($val,$atts)
	{
		return $val;
	}

}

?>