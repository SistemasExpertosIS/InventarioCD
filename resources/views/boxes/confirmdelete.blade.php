<div class="modal" tabindex="-1" role="dialog" id="borrarCaja">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header header-borrar">
        <h3 class="modal-title text-center"><span style="color: white;">Eliminar registro</span></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span style="position:relative; top:-27px; color:white;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body body-borrar">
        <h4>¿Está seguro(a) de eliminar este registro?</h4>
        {!! Form::open(['route' => ['boxes.destroy', 'REQ_ID'], 'method' => 'delete', 'id' => 'formBorrarCaja']) !!}      
      </div>
      <div class="modal-footer footer-borrar">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>