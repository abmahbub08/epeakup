<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('agent.dashboard') }}" class="brand-link">
        <img src="{{ asset('boomboom') }}/dist/img/AdminLTELogo.png" alt="Epeakup Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Epeakup</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('boomboom/avatar/'.Auth::guard('agent')->user()->avatar) }}"
                     style="width: 40px;height: 40px;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('agent.showProfile') }}" class="d-block">
                    {{ Auth::guard('agent')->user()->fullName() }}
                </a>
                <a href="{{ route('agent.change.password') }}">
                    <small>Change Password</small>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('agent.dashboard') }}" class="nav-link {{ Request::routeIs('agent.dashboard')?'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ Request::routeIs('agent.transfer.balance')? 'menu-open':Request::routeIs('agent.transactions')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Transactions
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('agent.transfer.balance') }}" class="nav-link {{ Request::routeIs('agent.transfer.balance')?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Money</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('agent.transactions') }}" class="nav-link{{ Request::routeIs('agent.transactions')?' active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transactions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Clients
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('clients.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Client</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('clients.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Clients</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('receivers.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Receiver</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('receivers.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Receivers</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agent.money-request') }}" class="nav-link{{ Request::routeIs('agent.money-request')?' active':'' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>Money Request</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>