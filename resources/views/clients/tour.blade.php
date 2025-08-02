@include('clients.blocks.header')
@include('clients.blocks.banner')


<x-search-tour />


<!--Tour list -->
<div id="tour-section">
    <div class="container py-4">
        <h6 class="text-primary text-uppercase text-center" style="letter-spacing: 5px;">Danh sách</h6>
        <h1 class="text-center">Tour du lịch hiện hành</h1>


        <x-tour-list :tours="$tours" />

    </div>
    <div class="d-flex justify-content-center">
        {{ $tours->links('pagination::bootstrap-5') }}
    </div>

</div>


@include('clients.blocks.footer')
