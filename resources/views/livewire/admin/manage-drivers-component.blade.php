<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1>Manage Drivers</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Manage Drivers</li>
                </ul>
            </div>
        </section>
        <section class="page-section ">
            <div class="container">
                @if (!$users->isEmpty())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at </th>
                            <th scope="col">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user )
                        <tr>
                            <th scope="row">{{$user->name}}</th>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>

                            <td> 
                                <a herf="" onclick="confirm('Are you sure, You want to delete {{$user->name}} driver') || event.stopImmediatePropagation()"  wire:click.prevent="deleteUser({{$user->id}})" style="margin-left:10px "  class="btn btn-danger "> 
                                Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                @else
                    <p class="text-center">There is no user to display</p>
                @endif
                <div class="required" style="text-align: center;">
                    <a href="{{ route('admin.AddDriver')}}"   class="btn  btn-theme btn-theme-dark " > Add Driver</a>
                </div>
            </div>
        </section>
    </div>
</main>
