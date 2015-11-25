<?php
class Api_Feriados_Controller extends Base_Controller {
    public $restful = true;

    public function get_feriados($ano = null, $mes = null, $dia = null)
    {
        $this->options['hidden'] = array('tipo_id');

        if($ano)
            $this->options['ano'] = $ano;
        if($mes)
            $this->options['mes'] = $mes;
        if($dia)
            $this->options['dia'] = $dia;
        
        try{
            $feriados = FeriadoService::getFeriados($this->options);
        }catch (Exception $e){
            return 'Ha ocurrido un error al obtener los datos.';
        }
        
        if(!$feriados)
            return 'No se han encontrado feriados';

        foreach ($feriados as $key => $feriado) {
            $result[$key] = $feriado->to_array();
            $result[$key]['tipo'] = $feriado->Tipo()->nombre;
            foreach($feriado->leyes() as $key_ley => $ley){
                $result[$key]['leyes'][$key_ley]['nombre'] = $ley->nombre;
                $result[$key]['leyes'][$key_ley]['url'] = $ley->url;
            }
        }

        return $result;
    }
}
?>