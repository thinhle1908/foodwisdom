<x-app-layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Edit-product</h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                                Edit-order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('dashboard/order') }}"><i
                                    class="bx bx-link-alt me-1"></i> View order</a>
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
                            <form id="formAccountSettings" method="POST" action="/edit-order/{{ $order->order_id }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
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
                                        <label class="form-label" for="country">Order_status</label>
                                        <select id="country" class=" form-select s " name="order_status">
                                            <option @if($order->order_status==1)selected @endif value="1">Pedding</option>
                                            <option @if($order->order_status==2)selected @endif value="2">Cancel</option>
                                            <option @if($order->order_status==3)selected @endif value="3">Processing</option>
                                            <option @if($order->order_status==4)selected @endif  value="4">Done</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Edit order</button>
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
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
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
