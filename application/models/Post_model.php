<?php
class Post_model extends CI_Model 
{
	public $id;
	public $title;
	public $content;

	public function __construct()
	{
		parent::__construct();

	}

	public function getAll()
	{
		$query = $this->db->order_by('id DESC');
		$query = $this->db->where('addby', $_SESSION['logged_in']['username']);
		$query = $this->db->get('post');
		return $query->result();
	}

	public function getById($id)
	{
		$query = $this->db->get_where('post',array('id' => $id));
		return $query->row();
	}

	private function insert($post)
	{
		return $this->db->insert('post', $this);
	}

	private function update($post)
	{
		
		$this->db->set('title', $this->title);
		$this->db->set('content', $this->content);
		$this->db->where('id', $this->id);
		return $this->db->update('post');
	}

	public function delete()
	{
		$this->db->where('id', $this->id);
		return $this->db->delete('post');
	}

	public function save()
	{
		if(isset($this->id)) {
			return $this->update();
		} else {
			return $this->insert();
		}
	}

} //End of Class 
