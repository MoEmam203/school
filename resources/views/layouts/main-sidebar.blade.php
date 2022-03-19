<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('mainside.Dashboard') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!--Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#grades">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('mainside.Grades') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="grades" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grades.index') }}">{{ __('mainside.Grades List') }}</a></li>
                        </ul>
                    </li>
                    <!-- Classrooms -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classrooms">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ __('mainside.classrooms') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classrooms" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('classrooms.index') }}">{{ __('mainside.classroomsList') }}</a> </li>
                        </ul>
                    </li>
                    <!-- Sections -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
                            <div class="pull-left"><i class="ti-menu-alt"></i><span
                                    class="right-nav-text">{{ __('mainside.sections') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('mainside.sectionsList') }}</a> </li>
                        </ul>
                    </li>
                    <!-- Parents -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents">
                            <div class="pull-left"><i class="ti-blackboard"></i><span
                                    class="right-nav-text">{{ __('mainside.parents') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('parents') }}">{{ __('mainside.parentsList') }}</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
