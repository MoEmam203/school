<!-- delete_modal_Fee -->
<div class="modal fade" id="delete{{ $fee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('Fees_trans.delete_Fee') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('fees.destroy',$fee)}}" method="post">
                    @method('DELETE')
                    @csrf
                    {{ __('Fees_trans.Warning_Fee') }}
                    <input type="text" class="form-control" value="{{$fee->name}}" disabled>
                    <input type="text" class="form-control mt-3" value="{{$fee->grade->name}}" disabled>
                    <input type="text" class="form-control mt-3" value="{{$fee->classroom->name}}" disabled>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close')}}</button>
                        <button type="submit" class="btn btn-danger">{{ __('general.Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>