
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="btn-live-tab" ms-live-tab-link="{{action('\B\Panel\Controller@index_data')}}" >
                            <a href="#" aria-controls="home" role="tab" data-toggle="tab" class="active"><i class="fa fa-columns fa-fw"></i> Dashboard</a>
                        </li>
             
                
                        <li>
                            <a href="#"><i class="fa fa-building fa-fw" aria-hidden="true"></i>Office<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-download fa-fw" aria-hidden="true"></i> Receive File</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Porcess <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>  Forward</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>  Return</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Edit</a>
                                        </li>
                                   
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                                <li>
                                    <a href="#"><i class="fa fa-desktop fa-fw" aria-hidden="true"></i> Desk/Cabin/Table <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        
                                        <li>
                                            <a href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>  Manage</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>  View</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Edit</a>
                                        </li>
                                       
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Human Resource<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="btn-live-tab" ms-live-tab-link="{{action('\B\Employee\Controller@add_form')}}">
                                    <a href="#new"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> <i class="fa fa-user fa-fw" aria-hidden="true"></i> Recruit New Employee</a>
                                </li>

                                <li>
                                    <a href="#new"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i> Today's Attendance</a>
                                </li>
                                <li>
                                     <a href="#new"><i class="fa fa-user fa-fw" aria-hidden="true"></i> <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Ask For Leave</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Manage <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="btn-live-tab" ms-live-tab-link="{{action('\B\Employee\Controller@view_list')}}">
                                            <a href="#"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>  View</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Edit</a>
                                        </li>
                                       
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                   
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->