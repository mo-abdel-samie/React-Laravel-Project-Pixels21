<div class="sidebar" data-color="azure" data-background-color="white">
    <div class="logo">
        <a href="http://www.pixelseg.com" class="simple-text logo-mini">
            <img src="{{ asset('images/logo/logo Pixels.png') }}" class="img-fluid" width="80" alt="Pixels" />
        </a>
        <a href="http://www.pixelseg.com" class="simple-text logo-normal">
            Pixels EG 2021
        </a>
    </div>


    @php
        $sideBar = [
            "Dashboard" =>[
                "icon" => "dashboard",
                "href" => "admin.dashboard",
                "routes" => [
                    "admin/dashboard",
                ],
                "collapsed"=> false ,
            ],
            "Sections" =>[
                "icon" => "home",
                "href" => "admin.sections",
                "routes" => [
                    "admin/sections",
                ],
                "collapsed"=> false ,
            ],
            "Blogs" =>[
                "icon" => "rss_feed",
                "href" => "blogs",
                "routes" => [
                    "admin/blogs",
                    "admin/blogs/create",
                ],
                "collapsed"=> true ,
                "pages" => [
                    "All Blogs" =>[
                        "icon" => "dashboard",
                        "href" => "blogs.index",
                        "routes" => [
                            "admin/blogs",
                        ],
                        "collapsed"=> false ,
                    ],
                    "Create Blog" =>[
                        "icon" => "dashboard",
                        "href" => "blogs.create",
                        "routes" => [
                            "admin/blogs/create",
                        ],
                        "collapsed"=> false ,
                    ],
                ]
            ],
            "Courses" =>[
                "icon" => "group",
                "href" => "courses",
                "routes" => [
                    "admin/courses",
                    "admin/courses/create",
                ],
                "collapsed"=> true ,
                "pages" => [
                    "All courses" =>[
                        "icon" => "dashboard",
                        "href" => "courses.index",
                        "routes" => [
                            "admin/courses",
                        ],
                        "collapsed"=> false ,
                    ],
                    "Add Course" =>[
                        "icon" => "dashboard",
                        "href" => "courses.create",
                        "routes" => [
                            "admin/courses/create",
                        ],
                        "collapsed"=> false ,
                    ],
                ]
            ],
            "Projects" =>[
                "icon" => "engineering",
                "href" => "projects",
                "routes" => [
                    "admin/projects",
                    "admin/projects/create",
                ],
                "collapsed"=> true ,
                "pages" => [
                    "All Projects" =>[
                        "icon" => "dashboard",
                        "href" => "projects.index",
                        "routes" => [
                            "admin/projects",
                        ],
                        "collapsed"=> false ,
                    ],
                    "Create Project" => [
                        "icon" => "dashboard",
                        "href" => "projects.create",
                        "routes" => [
                            "admin/projects/create",
                        ],
                        "collapsed"=> false ,
                    ],
                ]
            ],
        ]
    @endphp

    <div class="sidebar-wrapper">
        <ul class="nav">

            @foreach ($sideBar as $LOneTitle=>$LOneDetails) {{-- Level one Of Sidebar (|) --}}
                <li class="nav-item 
                    @foreach ($LOneDetails["routes"] as $route) {{-- Route active for Level one Of Sidebar --}}
                        @if(request()->path() == $route) 
                            @if ($LOneDetails["collapsed"])
                                show
                            @else
                                active 
                            @endif
                        @endif 
                    @endforeach ">
                    <a class="nav-link" @if($LOneDetails["collapsed"]) href="#{{ $LOneDetails["href"] }}" role="button"  data-toggle="collapse"  @else href="{{ route($LOneDetails["href"]) }}" @endif >
                        <i class="material-icons">{{ $LOneDetails["icon"] }}</i>
                        <p>
                            {{ $LOneTitle }}
                            @if ($LOneDetails["collapsed"])
                                <span class="caret"></span>
                            @endif
                        </p>
                    </a>

                    @if ($LOneDetails["collapsed"])
                        <div id="{{ $LOneDetails["href"] }}" class="collapse " >
                            <ul class="nav">
                                @foreach ($LOneDetails["pages"] as $LTwoTitle => $LTwoDetails) {{-- Strat Level One Colapse --}}
                                    <li class="nav-item 
                                        @foreach ($LTwoDetails["routes"] as $route) {{-- Route active for Level one Of Sidebar --}}
                                            @if(request()->path() == $route) 
                                                @if ($LTwoDetails["collapsed"])
                                                    show
                                                @else
                                                    active 
                                                @endif
                                            @endif 
                                        @endforeach">
                                        <a class="nav-link"  href="{{ route($LTwoDetails["href"]) }}">{{ $LTwoTitle }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </li>
            @endforeach {{-- End of Level one Of Sidebar (|) --}}

            
            <!-- your sidebar here -->
        </ul>
    </div>
</div>
