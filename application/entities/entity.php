<?php
    class Entity extends Eloquent{
        protected $errors = array();
        protected $rules = array();
        protected $fields_types = array();

        public function save()
        {
            //Se transforma el objeto a un arreglo para ser validado
            $data = $this->to_array();

            $v = Validator::make($data, $this->rules);

            if ($v->fails()) {
                $this->errors = $v->errors;
                return false;
            }

            return parent::save();
        }

        public function errors()
        {
            return $this->errors;
        }

        // Se modifica el metodo "get_attribute" de Eloquent 
        // para permitir definir los tipos de datos que se desean usar.
        public function get_attribute($key)
        {
            $value = array_get($this->attributes, $key);
            
            if(isset($this->fields_types[$key])){
                $type = $this->fields_types[$key];
                switch ($type) {
                    case 'date':
                        $value = substr($value, 0, 10);
                        break;
                    
                    default:
                        settype($value, $this->fields_types[$key]);
                        break;
                }
            }

            return $value;
        }

    }
?>