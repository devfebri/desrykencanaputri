<!-- LOGO -->
<div class="topbar-left">
    <div class="text-center">
        <a href="{{ route(auth()->user()->role.'_permohonan') }}" class="logo"><img src="{{ asset('img/icon.png') }}" class="bg-white" height="80" alt="logo"></a>
        <h5></h5>
    </div>
</div>

<div class="sidebar-inner slimscrollleft" style="font-family:revert-layer;font-size:14px;">

    <div id="sidebar-menu">
        <ul>
            {{-- <li>
                <a href="{{ route(auth()->user()->role.'_dashboard') }}" class="waves-effect">
                    <i class="mdi mdi-home"></i>
                    <span> Dashboard </span>
                </a>
            </li> --}}

             <li>
                 <a href="{{ route(auth()->user()->role.'_permohonan') }}" class="waves-effect">
                     <i class="mdi mdi-home"></i>
                     <span> Permohonan </span>
                 </a>
             </li>
             @if(auth()->user()->role=='admin')

             <li>
                 <a href="{{ route(auth()->user()->role.'_user') }}" class="waves-effect">
                     <i class="mdi mdi-home"></i>
                     <span> User </span>
                 </a>
             </li>
             @endif

        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
