
@extends('Admin.Layout.index')
@section('Content')
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('ThongBao'))
                        <div class="alert alert-success">
                            {{session('ThongBao')}}
                            @endif()
                        </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Delete</th>
                                <th>Admin</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $user)
                            @if($user->admin==0)
                            <tr class="odd gradeX" align="center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phonenumber}}</td>
                                 
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="Admin/User/Xoa/{{$user->id}}"> Delete</a></td>
                                <td>
                                  <a id="User{{$user->id}}">  <input value="{{$user->admin}} " size="1" id="{{$user->id}}">
                                  </a>
                                  <button  style="border:none;" class="EditAdmin" EditAdmin="{{$user->id}}"><i class="fa fa-pencil fa-fw"></i></td></button>
                            </tr>

                            @endif
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <div id="film">Manh</div>
        <div id="search">Lanh</div>
        <!-- /#page-wrapper -->
        <script type="text/javascript">
            $(document).ready(function(){
     $("#film").click(function(){
        window.history.pushState({},"","review");
     })
 })
        </script>
  
@endsection