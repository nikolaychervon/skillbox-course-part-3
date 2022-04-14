<tr>
    <th scope="row">{{ $id }}</th>
    <td>{{ $contact->email }}</td>
    <td>{{ $contact->message }}</td>
    <td>{{ $contact->created_at->format('l jS F Y') }}</td>
</tr>
