<x-app-layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Add-product</h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                                Add-Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('dashboard/product') }}"><i
                                    class="bx bx-link-alt me-1"></i> View Product</a>
                        </li>
                    </ul>
                    <div class="card mb-4">
                        <h5 class="card-header">Profile Details</h5>
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <!-- Account -->

                        <hr class="my-0" />
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" action="/dashboard/add-product"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src={{asset('assets/img/avatars/1.png')}} class="d-block rounded"
                                            height="100" width="100" id="uploadedAvatar" />
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" class="account-file-input" hidden
                                                    accept="image/png, image/jpeg" name="image" />
                                            </label>
                                            <button type="button"
                                                class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>

                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800KB</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="firstName" class="form-label">Product Name</label>
                                        <input class="form-control" type="text" id="firstName" name="product_name" value=""
                                            autofocus />
                                    </div>
                                    {{-- <div class="mb-3 col-md-6">
                                        <label class="form-label" for="country">Manufacture</label>
                                        <select id="country" class="select1 form-select" name="manu_id">
                                            @foreach ($manufactures as $row)
                                                <option value="{{ $row->manu_id }}">{{ $row->manu_name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    {{-- <div class="mb-3 col-md-6">
                                        <label class="form-label" for="country">Protypes</label>
                                        <select id="country" class="select1 form-select" name="type_id">
                                            @foreach ($protypes as $row)
                                                <option value="{{ $row->type_id }}">{{ $row->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="mb-3 col-md-12">
                                        <label for="firstName" class="form-label">Price</label>
                                        <input class="form-control" type="text" id="firstName" name="price" value=""
                                            autofocus />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="firstName" class="form-label">QTY</label>
                                        <input class="form-control" type="text" id="firstName" name="qty" value=""
                                            autofocus />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="w3review" class="form-label">Description</label>
                                        <br>
                                        <textarea id="w3review" rows="6" cols="100%" style="width: 100%" name="description"></textarea>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="country">Visible</label>
                                        <select id="country" class="select1 form-select" name="visible">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="category">Categories</label>
                                        <select id="category" class="form-control selectpicker" name="arr_category[]" multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Add product</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ??
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , made with ?????? by
                    <a href="https://themeselection.com" target="_blank"
                        class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                    <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                    <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                        target="_blank" class="footer-link me-4">Documentation</a>

                    <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                        class="footer-link me-4">Support</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</x-app-layout>
