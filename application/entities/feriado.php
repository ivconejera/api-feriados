<?php 
    class Feriado extends Entity {
        public static $hidden = array('id', 'created_at', 'updated_at');
        protected $rules = array(
            'nombre' => 'required',
            'fecha' => 'required',
            'tipo_id' => 'required'
        );

        protected $fields_types = array(
            'fecha' => 'date'
        );

        public static $timestamps = true;
        
        public function tipo()
        {
            return $this->belongs_to('Tipo')->first();
        }

        public function leyes()
        {
            return $this->has_many_and_belongs_to('Ley')->get();
        }

        /*
        * Se fuerza a que el campo fecha sólo incluya la fecha y no la hora.
        */
        public function get_fecha()
        {
            return substr(array_get($this->attributes, 'fecha'),0,10);
        }
    }
?>