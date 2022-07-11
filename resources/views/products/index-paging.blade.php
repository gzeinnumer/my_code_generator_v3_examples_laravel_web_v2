<div class="row">
    <div class="col">
        <table class="table table-striped nowrap" id="myDatatable">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var url = window.location.href;
        var jsonData = paramsToJson(url);
        var table = $('#myDatatable').DataTable({
            processing: true,
            serverSide: true,
            bAutoWidth: false,
            scrollX: true,
            ordering: false,
            order: [
                [1, 'asc']
            ],
            ajax: {
                type: 'GET',
                url: "{{ route('products.data') }}",
                data: JSON.parse(jsonData)
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    width: '15px'
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'flag_active',
                    name: 'flag_active',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    width: '125px'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at',
                    width: '125px'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '125px'
                },
            ],
            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;', // or '←' 
                }
            }
        });
    });
</script>