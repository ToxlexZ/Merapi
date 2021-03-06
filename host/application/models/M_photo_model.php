<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class M_photo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get m_photo by id_photo
     */
    function get_m_photo($id_photo)
    {
        return $this->db->get_where('m_photo',array('id_photo'=>$id_photo))->row_array();
    }
    
    /*
     * Get all m_photo count
     */
    function get_all_m_photo_count()
    {
        $this->db->from('m_photo');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all m_photo
     */
    function get_all_m_photo($params = array())
    {
        $this->db->order_by('id_photo', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('m_photo')->result_array();
    }
        
    /*
     * function to add new m_photo
     */
    function add_m_photo($params)
    {
        $this->db->insert('m_photo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update m_photo
     */
    function update_m_photo($id_photo,$params)
    {
        $this->db->where('id_photo',$id_photo);
        return $this->db->update('m_photo',$params);
    }
    
    /*
     * function to delete m_photo
     */
    function delete_m_photo($id_photo)
    {
        return $this->db->delete('m_photo',array('id_photo'=>$id_photo));
    }
}
