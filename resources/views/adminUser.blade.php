<x-app-layout>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-5 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
            @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header">  <div >{{$users->appends(request()->all())->links()}}</div></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User_ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($users as $user)
                                <tr>
                                    <td><strong>{{ $user->id }}</strong></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-aruser"
                                                data-bs-toggle="dropdown">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ asset('delete-user/'.$user->id) }}"><i
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
