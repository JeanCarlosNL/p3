<?php

class core_persona {

    static function guardar($persona){
       $CI =& get_instance();
       $CI->db->insert('personas',$persona);
    }

    static function listado(){
        $CI =& get_instance();
        $rs=$CI->db->get('personas')->result();
        return $rs;
    }

    static function borrar(){
        $CI =& get_instance();
        $sql="delete from personas where id=?";
        $CI->db->query($sql,[$id]);
    }
}