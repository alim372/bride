@php
$title = 'Confirmation';
$body = 'Are you sure you want to delete <strong>'. $user_name . '</strong>?';
@endphp
{!! Form::open(['method'=>'DELETE','route'=>[$resource . '.destroy', App::getLocale(), $id]])!!}
<div class="modal modal-danger fade" id="danger_{{ $id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">{{ $title }}</h4>
      </div>
      <div class="modal-body">
        <p>{!! $body !!}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        {!! Form::submit('OK',[ 'class'=>'btn btn-outline'])!!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
{!! Form::close()!!}
