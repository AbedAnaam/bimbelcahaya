{!! Form::model($model, ['url'=>$form_url, 'method'=>'delete', 'class'=>'form-inline', 'onsubmit'=>"return confirm('Yakin akan dihapus?')"]) !!}

<a href="{!! $edit_url !!}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

{{-- <form
    class="d-inline"
    action="{{!! $delete_url !!}}"
    method="POST"
    onsubmit="return confirm('Apakah Anda benar ingin menghapus data ini?')">
    @csrf
    <input
        type="hidden"
        name="_method"
        value="DELETE"/>
    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
</form> --}}

{!! Form::button('<i class="fa fa-trash"></i>', ['type'=>'submit','class'=>'btn btn-sm btn-danger']) !!}
{!! Form::close() !!}