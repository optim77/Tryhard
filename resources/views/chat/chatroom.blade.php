@extends('master')
@section('content')

    <div class="container mt-5">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="row">
            <div class="col-sm-3">
                @foreach($friends as $friend)

                    <div onclick="choose({{$friend->id}},'{{$friend->firstName}}','{{$friend->surname}}')" style="cursor: pointer;" class="hover">
                        <img class="img-responsive w-25" src="files/upload/{{$friend->mainPhoto}}">
                        <span class="text-center ml-3">{{$friend->firstName}}</span>
                        <hr>
                    </div>

                    @endforeach
            </div>

            <div id="chatplace" class="col-sm-6 border-left border-right">
                <div class="text-center mt5 text-muted h2">
                    <i class="fas fa-pencil-alt"></i>
                </div>
                <p id="empty" class="text-center mt4 text-muted h4">Zacznij czatować ze znajomymi</p>
            </div>

            <div class="col-sm-3">



            </div>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>



        function choose(i,n,s) {

                openWindow = true;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('getConversation')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: 'user=' + i,
                    success: function (e) {

                        $("#chatplace").empty().append('<div class="">' +
                            '<span class="text-center border-bottom w-100">'+n +'  '+ s +'</span>' +
                            '<div id="display-messages" class="col-sm-12" style="height:400px;overflow: auto;padding: 12"></div><div class="">' +
                            '<textarea id="textArea" class="form-control"></textarea><button data-content="'+id+'" id="sendButton" onclick="send(id.val)" class="btn btn-info mt-1">Wyślij</button></div></div>');

                        let messages = e.conversation[0].file;


                        let rawFile = new XMLHttpRequest();
                        rawFile.open('GET',messages,false);
                        rawFile.onreadystatechange = function () {
                            if(rawFile.readyState === 4)
                            {
                                if(rawFile.status === 200 || rawFile.status == 0)
                                {
                                    let allText = rawFile.responseText;
                                    let z = allText.search('/user');
                                    let seed = allText.replace('/user:','');
                                    if (allText.search('date')){
                                        allText.replace('','date');
                                    }

                                    $("#display-messages").append(allText)
                                }
                            }
                        }
                        rawFile.send(null);


//                    function displayContents(contents) {
//                        $("#display-messages").append(contents)
//                        //element = document.getElementById('display-messages');
//                        //element.textContent = contents;
//                    }
//
//                    let reader = new FileReader();
//                    reader = function (e) {
//                        let content = e.target.result;
//                        console.log(messages);
//                        displayContents(content)
//                    }
                    }
                });
                id = i;
        }

        function send(u) {
            id = $("#sendButton").attr('data-content');
            let text =  $("#textArea").val();
            console.log(text);
            if(text !== null){
                $.ajax({
                    url: '{{route('getConversation')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: 'user=' + id + '&text=' + text,
                    success: function () {
                        document.getElementById('textArea').value = '';
                    }
                });
                $("#textArea").text('');
            }
        }

    </script>



    @endsection