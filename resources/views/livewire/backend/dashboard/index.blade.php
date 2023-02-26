<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    @foreach ($counters as $key => $counter)
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total {{ $key }}</p>
                            <h4 class="my-1 text-info">{{ $counter }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i
                                class="bx bxs-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
