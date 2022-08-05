@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Chat History') }}
                </div>

                <div class="card-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-HistoryLog">
                        <thead>
                            <tr>
                                <th width="10">
                                    {{ __('ID') }}
                                </th>
                                <th>
                                    {{ __('Date Time') }}
                                </th>
                                <th>
                                    {{ __('User Name') }}
                                </th>
                                <th>
                                    {{ __('First Name') }}
                                </th>
                                <th>
                                    {{ __('Last name') }}
                                </th>
                                <th>
                                    {{ __('Email') }}
                                </th>
                                
                                
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
@parent
<script type="application/javascript">
    $(function () {
        let table = $('.datatable-HistoryLog').DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('getdata') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'created_at', name: 'created_at', render:function(data){
                        return moment(data).format('MM-DD-YYYY HH:mm:ss'); 
                    } 
                },
                { data: 'user_id', name: 'user_id' },
                { data: 'firstname', name: 'firstname' },
                { data: 'lastname', name: 'lastname' },
                { data: 'email_address', name: 'email_address' }
                
            ],
            orderCellsTop: true,
            order: [[ 0, 'desc' ]],
            pageLength: 25,
        });
        
    
        
    });

</script>
@endsection