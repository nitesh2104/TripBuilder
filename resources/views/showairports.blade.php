<table>
    <thead>
    <tr>
        <th>
            Airport Name
        </th>
    </tr>
    </thead>
    <tbody>

    @foreach ($name as $user)
        <tr>
            <td>{{ $user->airport_name }}</td>
        </tr>
    @endforeach


    </tbody>
</table>