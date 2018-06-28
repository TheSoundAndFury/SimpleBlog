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

	/**
	 * Get all posts from the database
	 * @return mixed
	 */
	public function getAll()
	{
		$query = $this->db->order_by('id DESC');
		$query = $this->db->where('addby', $_SESSION['logged_in']['username']);
		$query = $this->db->get('post');
		return $query->result();
	}

	/**
	 * Get posts by post id
	 * @param $id
	 * @return mixed
	 */
	public function getById($id)
	{
		$query = $this->db->get_where('post',array('id' => $id));
		return $query->row();
	}

	/**
	 * Insert a new post to the database.
	 * @param $post
	 * @return mixed
	 */
	private function insert($post)
	{
		return $this->db->insert('post', $this);
	}

	/**
	 * Update a post.
	 * @param $post
	 * @return mixed
	 */
	private function update($post)
	{
		$this->db->set('title', $this->title);
		$this->db->set('content', $this->content);
		$this->db->where('id', $this->id);
		return $this->db->update('post');
	}

	/**
	 * Delete a post
	 * @return mixed
	 */
	public function delete()
	{
		$this->db->where('id', $this->id);
		return $this->db->delete('post');
	}

	/**
	 * Save Changes
	 * @return mixed
	 */
	public function save()
	{
		if(isset($this->id)) {
			return $this->update();
		} else {
			return $this->insert();
		}
	}

} //End of Class 
