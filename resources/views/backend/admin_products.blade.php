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
                    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
                    <p class="mb-4">Quản lý các sản phẩm.</p>

                    <!-- DataTales Example -->                 
                    <div class="card shadow mb-4">            
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                                <th>ID</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Mô tả</th>
                                                <th>Giá</th>
                                                <th>Hình ảnh</th>
                                                <th>Danh mục</th>
                                                <th>Hành động</th>
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
                                                <th><button class="btn btn-success btn-sm" id="createProductButton">Create</button></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                            <td>{{ $product->id }}</td>
                                            <td contenteditable="true" class="editable" data-id="{{ $product->id }}" data-field="name">{{ $product->name }}</td>
                                            <td>
                                                <textarea class="editable" data-id="{{ $product->id }}" data-field="description" rows="3">{{ $product->description }}</textarea>
                                            </td>                                            
                                            <td contenteditable="true" class="editable" data-id="{{ $product->id }}" data-field="price">{{ $product->price }}</td>
                                            <td contenteditable="true" class="editable" data-id="{{ $product->id }}" data-field="image_url"><img src="{{ $product->image_url }}" alt="{{ $product->name }}" style="width: 100px;"></td>
                                            <td>
                                                <select class="editable-select" data-id="{{ $product->id }}" data-field="category">
                                                    <option value="HoaTuoi" {{ $product->category == 'HoaTuoi' ? 'selected' : '' }}>Hoa Tươi</option>
                                                    <option value="HoaSap" {{ $product->category == 'HoaSap' ? 'selected' : '' }}>Hoa Sáp</option>
                                                    <option value="BoHoa" {{ $product->category == 'BoHoa' ? 'selected' : '' }}>Bó Hoa</option>
                                                </select>
                                            </td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm edit" data-id="{{ $product->id }}">Edit</button>
                                                    <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Popup Form -->
                    <div id="createProductModal" class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="createProductForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image_url">Image URL</label>
                                            <input type="text" class="form-control" id="image_url" name="image_url" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" id="category" name="category" required>
                                                <option value="HoaTuoi">Hoa Tươi</option>
                                                <option value="HoaSap">Hoa Sáp</option>
                                                <option value="BoHoa">Bó Hoa</option>
                                            </select>                                        
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            // Show create product modal
                            $('#createProductButton').on('click', function() {
                                $('#createProductModal').modal('show');
                            });

                            // Handle create product form submit
                            $('#createProductForm').on('submit', function(e) {
                                e.preventDefault();
                                $.ajax({
                                    url: '/admin_products',
                                    type: 'POST',
                                    data: $(this).serialize(),
                                    success: function(response) {
                                        alert('Product created successfully');
                                        location.reload();
                                    },
                                    error: function(response) {
                                        alert('Error creating product');
                                    }
                                });
                            });

                            // Handle contenteditable fields
                            $('.editable').on('blur', function() {
                                let id = $(this).data('id');
                                let field = $(this).data('field');
                                let value = $(this).text();
                                updateProduct(id, field, value);
                            });

                            // Handle select dropdown change
                            $('.editable-select').on('change', function() {
                                let id = $(this).data('id');
                                let field = $(this).data('field');
                                let value = $(this).val();
                                updateProduct(id, field, value);
                            });

                            // Handle edit button click
                            $('.edit').on('click', function() {
                                var id = $(this).data('id');
                                var row = $(this).closest('tr');
                                var name = row.find('[data-field="name"]').text();
                                var description = row.find('[data-field="description"]').val(); // Sử dụng .val() cho textarea
                                var price = row.find('[data-field="price"]').text();
                                var image_url = row.find('[data-field="image_url"] img').attr('src');
                                var category = row.find('select').val();

                                $.ajax({
                                    url: '/admin_products/' + id,
                                    type: 'PUT',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        name: name,
                                        description: description,
                                        price: price,
                                        image_url: image_url,
                                        category: category
                                    },
                                    success: function(response) {
                                        alert('Product updated successfully');
                                        location.reload();
                                    },
                                    error: function(response) {
                                        alert('Error updating product');
                                    }
                                });
                            });

                            // Handle delete button click
                            $('.delete').on('click', function() {
                                var id = $(this).data('id');
                                var row = $(this).closest('tr');
                                if (confirm('Are you sure you want to delete this product?')) {
                                    $.ajax({
                                        url: '/admin_products/' + id,
                                        type: 'DELETE',
                                        data: {
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            row.remove();
                                            alert('Product deleted successfully');
                                            location.reload();
                                        },
                                        error: function(response) {
                                            alert('Error deleting product');
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
                        <span>Bản quyền &copy;</span>
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

</html>