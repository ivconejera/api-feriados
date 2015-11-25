<?php 
    abstract class FeriadoService {
        public static $options = array(
            'orderBy'   => 'fecha',
            'orderDir'  => 'ASC',
            'limit'     => 50,
            'offset'    => 0
        );

        public static function getFeriados($options = array(), $pagination = false)
        {
            $options = array_merge(FeriadoService::$options, $options);

            $query = Feriado::order_by($options['orderBy'], $options['orderDir']);

            if(isset($options['hidden']))
                Feriado::$hidden = array_merge(Feriado::$hidden, $options['hidden']);
            
            if(isset($options['ano']) && $options['ano'])
                $query->raw_where('YEAR(fecha) = ?', array($options['ano']));

            if(isset($options['mes']) && $options['mes'])
                $query->raw_where('MONTH(fecha) = ?', array($options['mes']));

            if(isset($options['dia']) && $options['dia'])
                $query->raw_where('DAY(fecha) = ?', array($options['dia']));

            if(isset($options['tipo_id']) && $options['tipo_id'])
                $query->where('tipo_id', '=', $options['tipo_id']);

            if($pagination){
                return $query->paginate($options['limit']);
            }else{
                $query->take($options['limit'])->skip($options['offset']);
                return $query->get();
            }
        }

        public static function getAnosActivos()
        {
            return DB::query('SELECT DATE_FORMAT(fecha, "%Y") AS ano FROM feriados GROUP BY ano ORDER BY ano ASC');
        }

        public static function actualizaLeyesAsociadas($feriado, $leyes = array())
        {
            //Elimina las leyes ya asociadas al feriado
            foreach($feriado->leyes() as $ley){
                $feriado_ley = FeriadoLey::where('ley_id', '=', $ley->id)->where('feriado_id', '=', $feriado->id)->first();
                $feriado_ley->delete();
            }

            //Crea las nuevas asociaciones
            foreach ($leyes as $key => $ley_nombre) {
                $ley = Ley::where('nombre', '=', $ley_nombre)->first();
                $feriado_ley = FeriadoLey::create(array(
                    'feriado_id' => $feriado->id,
                    'ley_id' => $ley->id
                ));
            }
            return true;
        }
    }
?>