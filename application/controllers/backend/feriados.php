<?php
class Backend_Feriados_Controller extends Controller {
    public $restful = true;
    public $layout = 'backend.layout';

    public function get_index()
    {
        $data['limit'] = 20;
        $data['offset'] = (intval(Input::get('page', 1))-1)*intval($data['limit']);
        $data['tipo_id'] = Input::get('tipo_id', '');
        $data['ano'] = Input::get('ano', '');

        $data['anos'] = FeriadoService::getAnosActivos();
        $data['tipos'] = Tipo::all();

        $data['feriados'] = FeriadoService::getFeriados($data);

        //Se obtiene la paginacion
        $data['paginacion'] = FeriadoService::getFeriados($data, true);

        $this->layout->nest('content', 'backend.feriados.list', $data);
    }

    public function get_add()
    {
        $data['tipos'] = Tipo::all();
        $data['leyes'] = Ley::all();

        if(Session::get('feriado')){
            $data['feriado'] = Session::get('feriado');
        }else{
            $data['feriado'] = new Feriado;
        }

        $this->layout->nest('content', 'backend.feriados.form', $data);
    }

    public function post_add()
    {
        $feriado = new Feriado;

        $feriado->nombre = Input::get('nombre', '');
        $feriado->comentarios = Input::get('comentarios', '');
        $feriado->fecha = Input::get('fecha', null);
        $feriado->tipo_id = Input::get('tipo_id', 0);
        $feriado->irrenunciable = Input::get('irrenunciable', 0);

        if($feriado->save()){
            FeriadoService::actualizaLeyesAsociadas($feriado, Input::get('leyes', array()));
            return Redirect::to('backend/feriados')->with('message','Feriado creado.');
        }else{
            return Redirect::to('backend/feriados/add')->with('feriado', $feriado);
        }
    }

    public function get_edit($id_feriado = null)
    {
        $data['tipos'] = Tipo::all();
        $data['leyes'] = Ley::all();

        if(Session::get('feriado')){
            $data['feriado'] = Session::get('feriado');
        }else{
            $data['feriado'] = Feriado::find($id_feriado);
        }

        $this->layout->nest('content', 'backend.feriados.form', $data);
    }

    public function post_edit($id_feriado = null)
    {
        $feriado = Feriado::find($id_feriado);

        $feriado->nombre = Input::get('nombre', '');
        $feriado->comentarios = Input::get('comentarios', '');
        $feriado->fecha = Input::get('fecha', null);
        $feriado->tipo_id = Input::get('tipo_id', 0);
        $feriado->irrenunciable = Input::get('irrenunciable', 0);

        if($feriado->save()){
            FeriadoService::actualizaLeyesAsociadas($feriado, Input::get('leyes', array()));
            return Redirect::to('backend/feriados')->with('message', 'Feriado actualizado.');
        }else{
            return Redirect::to('backend/feriados/edit/'.$feriado->id)->with('feriado', $feriado);
        } 
    }

    public function get_delete($id_feriado = null)
    {
        $feriado = Feriado::find($id_feriado);

        if($feriado->delete()){
            return Redirect::to('backend/feriados')->with('message', 'Feriado eliminado.');
        }else{
            return Redirect::to('backend/feriados')->with('message', 'Error al eliminar el feriado.');
        }
    }
}
?>