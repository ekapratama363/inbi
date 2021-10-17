<?php

class user_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function save()
    {
        $pass = md5($this->input->post('new'));
        $data = array (
        'usr_password' => $pass
        );
        $this->db->where('usr_id', $this->session->userdata('usr_id'));
        $this->db->update('users', $data);
    }
// fungsi untuk mengecek password lama :
    public function cek_old()
    {
        $old = md5($this->input->post('old'));    
        $this->db->where('usr_password',$old);
        $query = $this->db->get('users');
        return $query->result();;
    }

	public function get_login($user, $pass){
		$this->db->select('*');
		$this->db->from('core_user');
		$this->db->join('core_group','core_user.coreUserGroupId=core_group.coreGroupId');
		$this->db->where("coreUserName=".$this->db->escape($user));
		// $this->db->where("coreUserPassword=".$this->db->escape($pass));					
		$this->db->where('coreUserActive', '1');
		$query = $this->db->get();
        return $query->result();
	}
    
    public function get_user_by_email($email)
    {
        $query = $this->db
                ->select('*')
                ->from('core_user')
                ->join('core_group', 'core_user.coreUserGroupId=core_group.coreGroupId', 'left')
                ->where('core_user.coreUserEmail', $email)
                ->where('core_user.coreUserActive', 1)
                ->get();

        return $query->row_object();
    }


    public function set_user($data) 
    {
        return $this->db->insert('core_user', $data);
    }

    public function get_ajax_list_user($data = NULL)
    {
        
        $match = isset($data['search']) ? $data['search'] : '';
        $query = $this->db
                ->select('*')
                ->from('core_user')
                ->join('core_group', 'core_user.coreUserGroupId=core_group.coreGroupId', 'left')
                ->where('(core_group.coreGroupName LIKE \'%'.$match.'%\' 
                            or core_user.coreUserName LIKE \'%'.$match.'%\'
                            or core_user.coreUserEmail LIKE \'%'.$match.'%\')')
                ->order_by('core_user.coreUserId', isset($data['order']) ? 'asc' : 'desc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get();

        return $query->result_object();
    }

    public function get_user_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('core_user')
                ->join('core_group', 'core_user.coreUserGroupId=core_group.coreGroupId', 'left')
                ->where('core_user.coreUserId', $id)
                ->get();

        return $query->row_object();
    }

    public function update_user_by_id($id, $data)
    {
        $query = $this->db->where('coreUserId', $id)->update('core_user', $data);

        return $query;
    }

    public function delete_user_by_id($id)
    {
        $this->db->where(['coreUserId' => $id]);
	    $this->db->delete('core_user');
    }

}