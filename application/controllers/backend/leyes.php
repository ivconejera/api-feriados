<?php
class Backend_Leyes_Controller extends Controller {
    public $restful = true;
    public $layout = 'backend.layout';

    public function get_index()
    {
        $data['limit'] = 40;
        $data['offset'] = Input::get('offset', 0);

        $data['leyes'] = Ley::take($data['limit'])->skip($data['offset'])->order_by('nombre', 'ASC')->get();
        $this->layout->nest('content', 'backend.leyes.list', $data);
    }

    public function get_add()
    {
        if(Session::get('ley')){
            $data['ley'] = Session::get('ley');
        }else{
            $data['ley'] = new Ley;
        }

        $this->layout->nest('content', 'backend.leyes.form', $data);
    }

    public function post_add()
    {
        $ley = new Ley;

        $ley->nombre = Input::get('nombre', '');
        $ley->url = Input::get('url', '');

        if($ley->save()){
            return Redirect::to('backend/leyes')->with('message','Ley creada.');
        }else{
            return Redirect::to('backend/leyes/add')->with('ley', $ley);
        }
    }

    public function get_edit($id_ley = null)
    {
        if(Session::get('ley')){
            $data['ley'] = Session::get('ley');
        }else{
            $data['ley'] = Ley::find($id_ley);
        }

        $this->layout->nest('content', 'backend.leyes.form', $data);
    }

    public function post_edit($id_ley = null)
    {
        $ley = Ley::find($id_ley);

        $ley->nombre = Input::get('nombre', '');
        $ley->url = Input::get('url', '');

        if($ley->save()){
            return Redirect::to('backend/leyes')->with('message','Ley Actualizada.');
        }else{
            return Redirect::to('backend/leyes/add')->with('ley', $ley);
        } 
    }

    public function get_delete($id_ley = null)
    {
        $ley = Ley::find($id_ley);

        if($ley->delete()){
            return Redirect::to('backend/leyes')->with('message', 'Ley eliminada.');
        }else{
            return Redirect::to('backend/leyes')->with('message', 'Error al eliminar la ley.');
        }
    }
}
?>