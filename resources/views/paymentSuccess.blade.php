<x-layout>
    @section('scripts')
        <style>
            @media (min-width: 1025px) {
                .h-custom {
                    height: 100vh !important;
                }
            }
        </style>
    @endsection
    @section('content')
        <section class="h-100 h-custom">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <a href="/"><button type="button" class="btn btn-primary" style="margin-top:200px">Continue Shopping</button></a>
                    <div class="alert alert-success">
                        <strong>Success!</strong> Indicates a successful or positive action.
                    </div>
                    
                    <a href="/orders"><button type="button" class="btn btn-primary" style="margin-top:200px">View Order</button></a>
                </div>
               
            </div>
        </section>
    @endsection
</x-layout>
