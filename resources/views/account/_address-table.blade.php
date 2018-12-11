<h5 class="card-title">My Address</h5>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Label</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
    @forelse (Auth::user()->customer->addresses as $address)
      <tr>
        <th>{{ $address->name }}</th>
        <td>{{ $address->address }}</td>
        <td>{{ $address->phone }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="3">Empty</td>
      </tr>
    @endforelse
  </tbody>
</table>