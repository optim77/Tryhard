<div style="height: 4vh;background-color: #007bff" class="container-fluid text-white">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <p class="d-flex justify-content-center h3">Logo</p>
        </div>
        <div class="col-sm-1">
            <p class="d-flex justify-content-center h5 mt-2"><a class="text-white" href="{{route('userProfile')}}"><i class="fas fa-user"></i></a></p>
        </div>
        <div class="col-sm-1">
            <p class="d-flex justify-content-center h5 mt-2">Szukaj</p>
        </div>
        <div class="col-sm-1">
            <p id="profileButton" style="cursor: pointer" class="d-flex justify-content-center h5 mt-2"><i class="fas fa-cog h5"></i></p>
            <ul id="profileList"  class="d-flex justify-content-center text-dark list-group text-center">
                <a href="" style="display: none" class="list-group-item profileList">Ustawienia</a>
                <a href="" style="display: none" class="list-group-item profileList">Wyloguj</a>
            </ul>
        </div>
    </div>
</div>