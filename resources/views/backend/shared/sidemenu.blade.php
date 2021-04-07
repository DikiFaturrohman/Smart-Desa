<aside id="sidebar-wrapper">

    <div class="sidebar-brand">

        <a href="{{route('backend.dashboard')}}">{{(Auth::user()->desa->nama)??'Super User'}}</a>

    </div>

    <div class="sidebar-brand sidebar-brand-sm">

        <a href="{{route('backend.dashboard')}}">{{(Auth::user()->desa->nama)??'SU'}}</a>

    </div>

    <ul class="sidebar-menu">

        <li class="nav-item dropdown {{ Request::routeIs('backend.dashboard') ? 'active' : '' }}">

            <a href="{{route('backend.dashboard')}}" class="nav-link"><i class="fas fa-tachometer-alt"></i>

                <span>Dashboard</span></a>

        </li>

        @if(Auth::check())

        @php

        $permissions = \App\Models\Permission::where('role_id',Auth::user()->roles->first()->id)->get();

        $moduls = \App\Models\Permission::where('role_id',Auth::user()->roles->first()->id)->groupBy('modul_id')->get();

        @endphp

        @endif

        @if(!empty($permissions))

        @if(count($moduls) > 0)

        @foreach($moduls as $modul)

        <li class="nav-item dropdown">

            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{$modul->modul->icon}}"></i>

                <span>{{$modul->modul->name}}</span></a>

            <ul class="dropdown-menu">

                @foreach($permissions as $permission)

                @if($modul->modul_id == $permission->modul_id)

                <!-- <form method="post" action="{{route($permission->menu->route)}}">

                    {{csrf_field()}}

                    <li class="{{ Request::routeIs($permission->menu->route.'*') ? 'active' : '' }}">

                        <input type="hidden" name="menu_id" value="{{$permission->menu_id}}">

                        <a class="nav-link" href="javascript:void(0)"

                            onclick="this.parentNode.parentNode.submit();">{{$permission->menu->name}}</a>

                    </li>

                </form> -->

                <li class="{{ Request::routeIs($permission->menu->route.'*') ? 'active' : '' }}">

                    <a class="nav-link" href="{{route($permission->menu->route)}}">{{$permission->menu->name}}</a>

                </li>

                @endif

                @endforeach

            </ul>

        </li>

        @endforeach

        @endif

        @endif

  </ul>

</aside>

