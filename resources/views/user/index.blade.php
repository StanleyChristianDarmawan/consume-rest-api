<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
  margin-top: 30px
}
th {
  background-color: #106CF6;
  width: 20%;
  color: white
}
.create{
    font: bold 15px Arial;
    text-decoration: none;
    background-color: #137ed4;
    color: white;
    padding: 5px 7px 5px 7px;
    /* border-top: 1px solid #CCCCCC;
    border-right: 1px solid #333333;
    border-bottom: 1px solid #333333;
    border-left: 1px solid #CCCCCC; */

    /* margin-bottom: 100px */
}

.edit{
    font: bold 11px Arial;
    text-decoration: none;
    background-color: #4CAF50;
    color: white;
    padding: 2px 6px 2px 6px;
    border-top: 1px solid #CCCCCC;
    border-right: 1px solid #333333;
    border-bottom: 1px solid #333333;
    border-left: 1px solid #CCCCCC;
}

.button {
    font: bold 11px Arial;
    background-color: rgb(218, 33, 33); /* Green */
    border: none;
    color: white;
    padding: 2px 6px 2px 6px;
    border-top: 1px solid #CCCCCC;
    border-right: 1px solid #333333;
    border-bottom: 1px solid #333333;
    border-left: 1px solid #CCCCCC;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 11px;
}

</style>
<a class="create" href="{{ route('users.create') }}">Create</a>
<table>
    <tbody>
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Action</th>
        @php
            $number = 1;
        @endphp
            {{-- di foreach dari $users['data'] karna biasanya response dari API itu di bungkus dalam index 'data' --}}
        @forelse($users['data'] as $user)
        <tr>
            <td>{{ $number++ }}</td>
            <td>{{ $user['firstName'] }}</td>
            <td>{{ $user['lastName'] }}</td>
            <td align="center">
                {{-- //modify button delete yg ada dalam table html sebelumnya menjadi: --}}
                <form method="POST" action="{{ 'users/'.$user['id'] }}">
                    @method('DELETE')
                    @csrf

                    <a class="edit" href="{{ 'users/'.$user['id'] }}" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
                    <button class="button" type="submit" class="text-danger btn btn-link" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</button>
                </form>
            </td>

        </tr>
        @empty
            <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
        @endforelse
    </tbody>
</table>