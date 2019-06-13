<?php $currentUser = Auth::user() ?>
@if(isset($currentUser))              

<aside class="left-sidebar">
    <div class="col-md-3">
        <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3>Bootstrap Sidebar</h3>
                            <strong>BS</strong>
                        </div>
            
                        <ul class="list-unstyled components">
                            <li class="active">
                                <a href="{{route('home')}}" >
                                    <i class="fa fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auther', $currentUser->id) }}" >
                                    <i class="fa fa-home"></i>
                                    My Posts
                                </a>
                            </li>
                        </ul>
                    </nav>
        </div>
</aside>
    @endif
