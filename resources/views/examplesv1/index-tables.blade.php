<div class="row">
    <div class="col">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <td>Name</td>
                    <td>Active</td>
                    <td>Created at</td>
                    <td>Updated at</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->flag_active}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>
                    <td>
                        <a href="/examplesv1/find/{{$d->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/examplesv1/update/{{$d->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/examplesv1/delete/{{$d->id}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>