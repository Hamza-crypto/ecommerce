<div class="row">
    @if (auth()->user()->role == 'customer')
        <div class="col-12 col-sm-6 col-xxl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-2">{{ auth()->user()->getBalance() }} BTC</h3>
                            <p class="mb-2">Total Balance</p>
                            <div class="mb-0">
                                    <span class="badge badge-soft-success mr-2">
                                        <i class="mdi mdi-arrow-bottom-right"></i>
                                        {{ to_usd(auth()->user()->getBalance()) }} USD
                                    </span>
                                <span class="text-muted">Current Market Price</span>
                            </div>
                        </div>
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle text-success"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-2">{{ auth()->user()->transactions->count() }} Redeems</h3>
                            <p class="mb-2">Total Redemptions</p>
                            <div class="mb-0">
                                    <span class="badge badge-soft-success mr-2">
                                        <i class="mdi mdi-arrow-bottom-right"></i>
                                        {{ auth()->user()->transactions->last()->usd_amount ?? 0 }} USD
                                    </span>
                                <span class="text-muted">Last Redeem</span>
                            </div>
                        </div>
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card align-middle text-success"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()->role == 'reseller')
        <div class="col-12 col-sm-6 col-xxl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-2">{{ auth()->user()->getBalance() }} USD</h3>
                            <p class="mb-2">Total Balance</p>
                        </div>
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign align-middle text-success"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-2">{{ auth()->user()->inventories->count() }} Inventories</h3>
                            <p class="mb-2">Total Inventories</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ auth()->user()->countBatches() }} Batches
                                </span>
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ auth()->user()->countCards() }} Cards
                                </span>
                            </div>
                        </div>
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag align-middle text-success"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-2">{{ auth()->user()->countCards() }} Cards</h3>
                            <p class="mb-2">Total Cards</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ auth()->user()->cardsWorth() }} USD
                                </span>
                            </div>
                        </div>
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card align-middle text-success"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()->role == 'admin')
        <div class="col-12 col-sm-6 col-xxl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-2">{{ \App\Models\User::count() }} Users</h3>
                            <p class="mb-2">Total Users</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ \App\Models\User::where('role', 'customer')->count()  }} Customers
                                </span>
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ \App\Models\User::where('role', 'reseller')->count()  }} Resellers
                                </span>
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ \App\Models\User::where('role', 'admin')->count()  }} Admins
                                </span>
                            </div>
                        </div>
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle text-success"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-2">{{ \App\Models\Inventory::count() }} Inventories</h3>
                            <p class="mb-2">Total Inventories</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ \App\Models\Batch::count()  }} Batches
                                </span>
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ \App\Models\Card::count()  }} Cards
                                </span>
                            </div>
                        </div>
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag align-middle text-success"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-2">{{ \App\Models\Transaction::count() }} Redeems</h3>
                            <p class="mb-2">Total Redeems</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ \App\Models\Transaction::sum('usd_amount') }} USD
                                </span>
                                <span class="badge badge-soft-success mr-2">
                                    <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ \App\Models\Transaction::sum('btc_amount') }} BTC
                                </span>
                            </div>
                        </div>
                        <div class="d-inline-block ml-3">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card align-middle text-success"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
