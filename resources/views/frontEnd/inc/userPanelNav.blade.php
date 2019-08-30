<div class="col-lg-3 d-lg-block d-none pt-4 pb-5">
    <aside class="left-side-bar py-5">
        <div class="list-group list-group-flush">
            <a href="{{ route('transactions') }}" class="list-group-item list-group-item-action active">
                My Transactions
            </a>
            <a href="{{ route('details') }}" class="list-group-item list-group-item-action">My Details</a>
            <a href="{{ route('recipients') }}" class="list-group-item list-group-item-action">My Recipients</a>
            {{--<a href="{{ route('settings') }}" class="list-group-item list-group-item-action">Settings</a>--}}
        </div>
    </aside>
</div>