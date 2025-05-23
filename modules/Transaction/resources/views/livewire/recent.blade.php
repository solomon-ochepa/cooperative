<div class="section my-4">
    <div class="section-heading">
        <h2 class="title">Transactions</h2>
        <a class="link" href="{{ route('transaction.index') }}">View All</a>
    </div>

    <div class="transactions">
        @forelse ($transactions ?? [] as $transaction)
            <a class="item" href="#">
                <div class="detail">
                    <img alt="img" class="image-block imaged w48"
                        src="{{ asset('assets/img/sample/brand/1.jpg') }}">
                    <div>
                        <strong>{{ $transaction->type }}</strong>
                        <p>{{ $transaction->description }}</p>
                    </div>
                </div>
                <div class="right">
                    <div class="price text-danger"> {{ $transaction->amount }}</div>
                </div>
            </a>
        @empty
            <div class="item">
                <div class="detail">
                    <div>
                        <strong>No records found!</strong>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
