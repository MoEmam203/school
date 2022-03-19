<button class="btn btn-success btn-sm m-2" wire:click="showAddForm" type="button">{{ __('mainside.parentsCreate') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ __('Parent_trans.email') }}</th>
            <th>{{ __('Parent_trans.father_name_'.Config::get('app.locale')) }}</th>
            <th>{{ __('Parent_trans.father_national_id') }}</th>
            <th>{{ __('Parent_trans.father_passport_id') }}</th>
            <th>{{ __('Parent_trans.father_phone') }}</th>
            <th>{{ __('Parent_trans.father_job_'.Config::get('app.locale')) }}</th>
            <th>{{ __('general.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($my_parents as $key => $my_parent)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->father_name }}</td>
                <td>{{ $my_parent->father_national_id }}</td>
                <td>{{ $my_parent->father_passport_id }}</td>
                <td>{{ $my_parent->father_phone }}</td>
                <td>{{ $my_parent->father_job }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ __('general.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $my_parent->id }}" title="{{ __('general.Delete') }}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>


            <!-- delete_modal_Grade -->
            <div class="modal fade" id="delete{{ $my_parent->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                {{ __('Parent_trans.deleteParent') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                {{ __('Parent_trans.warningParent') }}
                                <input type="text" class="form-control" value="{{$my_parent->father_name}}" disabled>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close')}}</button>
                                    <button type="button" class="btn btn-danger" wire:click="delete({{ $my_parent->id }})">{{ __('general.Submit') }}</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>
</div>