<tr>
    <th scope="row">{{ $user->id }}</th>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->is_active_title }}</td>
    <td>{{ $user->gender_title }}</td>
    <td>{{ optional($user->info)->birthday }}</td>
</tr>
