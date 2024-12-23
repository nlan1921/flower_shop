<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('backend') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('backend') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('backend') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản Lý</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Trang
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Trang</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="/">Shop</a>
                        <a class="collapse-item" href="/admin_products">Quản Lý Sản Phẩm</a>
                        <a class="collapse-item" href="/admin_users">Quản Lý Người Dùng</a>
                        <a class="collapse-item" href="/admin_orders">Quản Lý Đơn Hàng</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('backend') }}/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                 
                <!-- Begin Page Content -->
                <div class="container-fluid">

                                    
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Danh sách người dùng</h1>
                <p class="mb-4">Quản lý người dùng.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>--</th>
                        <th>--</th>
                        <th>--</th>
                        <th>--</th>
                        <th>--</th>
                        <th>--</th>
                        <th><button class="btn btn-success btn-sm" id="createUserButton">Create</button></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $user)
                    <tr id="user-{{ $user->id }}">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm edit-user" data-id="{{ $user->id }}">Edit</button>
                            <button class="btn btn-danger btn-sm delete-user" data-id="{{ $user->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for Create User -->
<div id="createUserModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createUserForm">
                    @csrf
                    <div class="form-group">
                        <label for="create_name">Name</label>
                        <input type="text" class="form-control" id="create_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="create_email">Email</label>
                        <input type="email" class="form-control" id="create_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="create_password">Password</label>
                        <input type="password" class="form-control" id="create_password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_role">Role</label>
                        <select class="form-control" id="edit_role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                                        <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit User -->
<div id="editUserModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_user_id" name="edit_user_id">
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_password">New Password (Leave blank to keep current)</label>
                        <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="create_role">Role</label>
                        <select class="form-control" id="create_role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Show create user modal
    $('#createUserButton').on('click', function() {
        $('#createUserModal').modal('show');
    });

    // Handle create user form submit
    $('#createUserForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/admin_users',
            type: 'POST',
            data: $(this).serialize() + '&_token={{ csrf_token() }}',
            success: function(response) {
                alert('User created successfully');
                location.reload();
            },
            error: function(xhr) {
                console.error('Error creating user:', xhr.responseText);
                alert('Error creating user: ' + xhr.responseText);
            }
        });
    });

    // Show edit user modal
    $(document).ready(function() {
    $('.edit-user').on('click', function() {
        var userId = $(this).data('id');
        $.get('/admin_users/' + userId, function(data) {
            $('#edit_user_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_email').val(data.email);
            $('#edit_role').val(data.role); // Ensure this matches your HTML structure
            $('#editUserModal').modal('show');
        }).fail(function(xhr, status, error) {
            console.error('Error fetching user data:', error);
            alert('Error fetching user data: ' + error);
        });
    });

    // Handle edit user form submission
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault();
        var userId = $('#edit_user_id').val();
        $.ajax({
            url: '/admin_users/' + userId,
            type: 'PUT',
            data: $(this).serialize() + '&_method=PUT&_token={{ csrf_token() }}',
            success: function(response) {
                alert('User updated successfully');
                $('#editUserModal').modal('hide');
                location.reload(); // Reload page or update specific parts as needed
            },
            error: function(xhr) {
                console.error('Error updating user:', xhr.responseText);
                alert('Error updating user: ' + xhr.responseText);
            }
        });
    });
});

    // Handle delete user button click
    $('.delete-user').on('click', function() {
        var userId = $(this).data('id');
        var row = $('#user-' + userId);
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: '/admin_users/' + userId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    row.remove();
                    alert('User deleted successfully');
                    location.reload();
                },
                error: function(xhr) {
                    console.error('Error deleting user:', xhr.responseText);
                    alert('Error deleting user: ' + xhr.responseText);
                }
            });
        }
    });
});
</script>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('backend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('backend') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend') }}/js/demo/datatables-demo.js"></script>

</body>
