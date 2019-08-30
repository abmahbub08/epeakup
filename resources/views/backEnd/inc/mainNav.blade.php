<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::routeIs('admin.home') ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="header">Agent Section</li>

            <li class="{{ Request::routeIs('agents.list') ? 'active' : '' }}">
                <a href="{{ route('agents.list') }}">
                    <i class="fa fa-circle-o text-red"></i>
                    <span>Agents</span>
                </a>
            </li>


            <li class="treeview {{ Request::routeIs('agent.orders') ? 'menu-open active' : Request::routeIs('agent.archive') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-dollar"></i>
                    <span> Agent Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('agent.orders') ? 'active' : '' }}">
                        <a href="{{ route('agent.orders') }}">
                            <i class="fa fa-circle-o text-aqua"></i>
                            <span>Agent Money Orders</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('agent.archive') ? 'active' : '' }}">
                        <a href="{{ route('agent.archive') }}">
                            <i class="fa fa-circle-o text-aqua"></i>
                            <span>Active Orders</span>
                        </a>
                    </li>
                </ul>
            </li>

            @admin('super')
            <li class="treeview {{ Request::routeIs('agent.money.request') ? 'menu-open active' : Request::routeIs('agent.request.archive') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-dollar"></i>
                    <span>Manage Agent</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('agent.money.request') ? 'active' : '' }}">
                        <a href="{{ route('agent.money.request') }}">
                            <i class="fa fa-circle-o text-aqua"></i>
                            <span>Money Request</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('agent.request.archive') ? 'active' : '' }}">
                        <a href="{{ route('agent.request.archive') }}">
                            <i class="fa fa-circle-o text-aqua"></i>
                            <span>Archive Money Request</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="header">Admin Section</li>

            <li class="treeview {{ Request::routeIs('orders.index') ? 'menu-open active' : Request::routeIs('orders.archive') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Payment Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        <small class="label pull-right bg-green">{{ $pending_order }}</small>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('orders.index') ? 'active' : '' }}">
                        <a href="{{ route('orders.index') }}">
                            <i class="fa fa-circle-o text-aqua"></i>
                            <span>Request Orders</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('orders.archive') ? 'active' : '' }}">
                        <a href="{{ route('orders.archive') }}">
                            <i class="fa fa-circle-o text-aqua"></i>
                            <span>Archive order</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview {{ Request::routeIs('countries.index') ? 'menu-open active' : Request::routeIs('countries.create') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-globe"></i> <span>Country Manage</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('countries.index') ? 'active' : '' }}">
                        <a href="{{ route('countries.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>Countries</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('countries.create') ? 'active' : '' }}">
                        <a href="{{ route('countries.create') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>Add Country</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::routeIs('services.index') ? 'menu-open active' : Request::routeIs('services.create') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Service Manage</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('services.index') ? 'active' : '' }}">
                        <a href="{{ route('services.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>Services</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('services.create') ? 'active' : '' }}">
                        <a href="{{ route('services.create') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>Add Service</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::routeIs('methods.index') ? 'menu-open active' : Request::routeIs('methods.create') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-anchor"></i>
                    <span>Payment Methods</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('methods.index') ? 'active' : '' }}">
                        <a href="{{ route('methods.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>Methods</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('methods.create') ? 'active' : '' }}">
                        <a href="{{ route('methods.create') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>Add Method</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::routeIs('currencies.index') ? 'menu-open active' : Request::routeIs('currencies.create') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-dollar"></i>
                    <span>Set Currencies</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('currencies.index') ? 'active' : '' }}">
                        <a href="{{ route('currencies.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>Currencies</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('currencies.create') ? 'active' : '' }}">
                        <a href="{{ route('currencies.create') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>Add Currency</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview {{ Request::routeIs('discounts.index') ? 'menu-open active' : Request::routeIs('discounts.create') ? 'menu-open active' : ''}}">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Manage Offers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('discounts.index') ? 'active' : '' }}">
                        <a href="{{ route('discounts.index') }}"><i class="fa fa-circle-o"></i> View Offers</a>
                    </li>
                    <li class="{{ Request::routeIs('discounts.create') ? 'active' : '' }}">
                        <a href="{{ route('discounts.create') }}"><i class="fa fa-circle-o"></i> Make Offer</a>

                    </li>
                </ul>
            </li>

            <li class="treeview {{ Request::routeIs('admin.register') ? 'menu-open active' : Request::routeIs('admin.show') ? 'menu-open active' : ''}}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Manage Admins</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('admin.show') ? 'active' : '' }}">
                        <a href="{{ route('admin.show') }}"><i class="fa fa-circle-o"></i> View Admins</a>
                    </li>
                    <li class="{{ Request::routeIs('admin.register') ? 'active' : '' }}">
                        <a href="{{ route('admin.register') }}"><i class="fa fa-circle-o"></i> Add Admin</a>

                    </li>
                </ul>
            </li>


            <li class="treeview {{ Request::routeIs('admin.roles') ? 'menu-open active'
                        : Request::routeIs('admin.role.create') ? 'menu-open active' : ''}}">
                <a href="#">
                    <i class="fa fa-expeditedssl"></i> <span>Admin Roles</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('admin.roles') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles') }}"><i class="fa fa-circle-o"></i>View Roles</a>
                    </li>
                    <li class="{{ Request::routeIs('admin.role.create') ? 'active' : '' }}">
                        <a href="{{ route('admin.role.create') }}"><i class="fa fa-circle-o"></i>Add new role</a>
                    </li>
                </ul>
            </li>
            <li class="header">Others</li>

            <li class="{{ Request::routeIs('issue.index') ? 'active' : '' }}">
                <a href="{{ route('issue.index') }}">
                    <i class="fa fa-circle-o text-red"></i>
                    <span>Issues</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('usersDetails.index') ? 'active' : '' }}">
                <a href="{{ route('usersDetails.index') }}">
                    <i class="fa fa-circle-o text-red"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="header">CMS</li>
            <li class="treeview {{ Request::routeIs('slider.index') ? 'menu-open active' : Request::routeIs('slider.create') ? 'menu-open active' : ''}}">
                <a href="#">
                    <i class="fa fa-image"></i> <span>Slider Images</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::routeIs('slider.index') ? 'active' : '' }}">
                        <a href="{{ route('slider.index') }}"><i class="fa fa-circle-o"></i>View Images</a>
                    </li>
                    <li class="{{ Request::routeIs('slider.create') ? 'active' : '' }}">
                        <a href="{{ route('slider.create') }}"><i class="fa fa-circle-o"></i>Add new Image</a>
                    </li>
                </ul>
            </li>

            @endadmin
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
