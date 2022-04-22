<h1>Display All Users</h1>
<br>

<table border="2" cellpadding="5" width="100%">
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Mobile</td>
    </tr>
    @foreach ($k as $z)
        <tr>
            <td>{{$z->name}}</td>
            <td>{{$z->email}}</td>
            <td>{{$z->mobile}}</td>
            <td>
                <a href="delete/{{$z->id}}">Delete</a>
            </td>
        </tr>
    @endforeach
</table>

{!! $k->links() !!}
