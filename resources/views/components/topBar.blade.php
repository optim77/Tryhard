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

        <div class="d-flex justify-content-center h5 mt-2 ml-4 mr-5">
            <i class="fas fa-users h4"></i>
        </div>

        <div id="friendList" class="table-bordered radius" style="position: fixed;right: 0px;top: 50px;width: 15%">
            <div class="row">
            @foreach($listOfFriends as $f)
                    <button onclick="gochat({{$f->id}})" class="text-dark col-sm-12 friend btn text-left pt-0 pb-0 pl-1">
                        <img class="w-25" src="files/upload/{{$f->mainPhoto}}">
                        <span class="text-dark ">{{$f->firstName}} {{$f->surname}}</span>
                    </button>

                @endforeach
                </div>
        </div>

    </div>

    <div class="" style="position: fixed;right: 20%; bottom: 0px" id="chatfield"></div>
</div>

<script>
    $("#profileButton").click(function () {
        $(".profileList").toggle();
    })


    function gochat(i) {
        $("#chatfield").append("<div class='alert text-danger'>Hello</div>")
        $(document).append('<div class=" btn btn-danger bg-danger">asddsads</div>');
    }


</script>