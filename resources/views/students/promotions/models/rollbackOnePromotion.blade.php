<!-- delete_modal_Teacher -->
<div class="modal fade" id="delete{{ $promotion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('Students_trans.rollback_Promotion') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('promotions.destroy',$promotion)}}" method="post">
                    @method('DELETE')
                    @csrf
                    {{ __('Students_trans.Warning_Promotion') }}
                    <input type="text" class="form-control" value="{{$promotion->student->name}}" disabled>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close')}}</button>
                        <button type="submit" class="btn btn-danger">{{ __('general.Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>