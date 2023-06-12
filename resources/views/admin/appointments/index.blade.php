@extends('layouts.admin')
@section('content')
@can('appointment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.appointments.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.appointment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.appointment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Appointment">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <!-- <th>
                        {{ trans('cruds.appointment.fields.id') }}
                    </th> !-->
                    <th>
                        {{ trans('cruds.appointment.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.employee') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.service') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.start_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.finish_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.appointment.fields.comments') }}
                    </th>
                    <!-- <th>
                        {{ trans('cruds.appointment.fields.services') }}
                    </th> !-->
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('appointment_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.appointments.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            };
            dtButtons.push(deleteButton);
        @endcan

        let dtOverrideGlobals = {
            buttons: dtButtons,
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ route('admin.appointments.index') }}",
            columns: [
                { data: 'placeholder', name: 'placeholder' },
                { data: 'user_name', name: 'user.name' },
                { data: 'employee_name', name: 'employee.name' },
                { data: 'service_name', name: 'service.name' },
                {
                    data: 'start_time',
                    name: 'start_time',
                    render: function (data) {
                        var currentDate = moment().format('YYYY-MM-DD');
                        var startDate = moment(data).format('YYYY-MM-DD');
                        if (startDate >= currentDate) {
                            return moment(data).format('h:mm A');
                        } else {
                            return moment(data).format('h:mm A');
                        }
                    }
                },
                {
                    data: 'finish_time',
                    name: 'finish_time',
                    render: function (data) {
                        var currentDate = moment().format('YYYY-MM-DD');
                        var startDate = moment(data).format('YYYY-MM-DD');
                        if (startDate >= currentDate) {
                            return moment(data).format('h:mm A');
                        } else {
                            return moment(data).format('h:mm A');
                        }
                    }
                },
                { data: 'comments', name: 'comments' },
                { data: 'actions', name: '{{ trans('global.actions') }}' }
            ],
            pageLength: 100,
        };

        $('.datatable-Appointment').DataTable(dtOverrideGlobals);

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
