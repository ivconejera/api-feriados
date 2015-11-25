<?php
    class Ley extends Entity {
        public static $table = 'leyes';
        public static $timestamps = false;
        
        protected $rules = array(
            'nombre' => 'required|unique:leyes'
        );
    }
?>