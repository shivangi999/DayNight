<table class="table table-bordered">
    <thead>
        <tr>
            <th width="100px">ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->client_name }}</td>
            <td>{{ $value->client_email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $data->render() !!}
