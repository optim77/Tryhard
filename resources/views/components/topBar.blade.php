<div style="height: 4vh;background-color: #007bff" class="container-fluid text-white">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <p class="d-flex justify-content-center h3"><a class="text-white" href="{{route('home')}}" >Logo</a></p>
        </div>
            <p class="d-flex justify-content-center h5 mt-2 mr-5"><a class="text-white" href="{{route('userProfile')}}"><i class="fas fa-user"></i></a></p>
            <p class="d-flex justify-content-center h5 mt-2 mr-5"><a class="text-white" href="{{route('upload')}}"><i class="fas fa-upload"></i></a></p>

            @if($data != null)
                <a href="{{route('notification')}}" class="text-danger h5 mt-2 mr-5"><i class="fas fa-flag"></i></a>
            @endif
            <p class="d-flex justify-content-center h5 mt-2 mr-5"><a class="text-white" href="{{route('search')}}"><i class="fas fa-search"></i></a></p>

        <div class="">
            <p id="profileButton" style="cursor: pointer" class="d-flex justify-content-center h5 mt-2"><i class="fas fa-cog h5"></i></p>
            <ul id="profileList"  class="d-flex justify-content-center text-dark list-group text-center">
                <a href="{{route('profileSettings')}}" style="display: none" class="list-group-item profileList">Ustawienia</a>
                <a href="{{route('logout')}}" style="display: none" class="list-group-item profileList">Wyloguj</a>
            </ul>
        </div>
    </div>
    <a href="{{route('baseChat')}}" class="btn btn-info p-2 m-2" style="position: fixed;right: 11%; bottom: 10%" id="chatfield"><i class="fas fa-comment-alt"></i></a>
</div>

