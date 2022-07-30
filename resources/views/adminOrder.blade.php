<x-app-layout>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-5 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header">  <div >{{$orders->appends(request()->all())->links()}}</div></div>
              
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order-ID</th>
                                <th>User-ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Note</th>
                                <th>Total</th>
                                <th>Order_status</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($orders as $order)
                                <tr>
                                    <td><strong>{{ $order->order_id }}</strong></td>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->note }}</td>
                                    <td>{{ $order->total }}</td>
                                    @if($order->order_status==1)
                                    <td>Pending </td>
                                    @elseif($order->order_status==2)
                                    <td>Cancel</td>
                                    @elseif($order->order_status==3)
                                    <td>Processing</td>
                                    @else
                                    <td>Done</td>
                                    @endif
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arproduct"
                                                data-bs-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ asset('edit-order/'.$order->order_id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ asset('delete-order/'.$order->order_id) }}"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
</x-app-layout>
