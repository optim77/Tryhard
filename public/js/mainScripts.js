$("#profileButton").click(function () {
    $(".profileList").toggle();
});

/*
    Function to roller ist make rolling and oldest roll to button of roll
 */
function roll() {

    $("#rollImg").show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let radios = document.getElementsByName('optradio');

    for (var i = 0, length = radios.length; i < length; i++)
    {
        if (radios[i].checked)
        {
            var gender = radios[i].value;
            break;
        }
    }

    $('#rollImg').toggleClass('rotated');

    $.ajax({
        url: '{{route('getRoll')}}',
        type: 'POST',
        dataType: 'json',
        data: 'roll='+ 'yes' + '&gender=' + gender,
        success: function (e) {
            $("#rollImg").hide();
            let first = e.user[0].firstName;
            let surname = e.user[0].surname;
            let id = e.user[0].id;
            let link = 'profile/'+ first + '-' + surname + '-' + id;
            $("#redirectToProfile").attr('href',link);
            $("#selected").attr('src','files/upload/' + e.user[0].mainPhoto);
            $("#nameUser").text(e.user[0].firstName + ' ' + e.user[0].surname);
            $(".previously").append(
                '<div class="col-sm-3 text-center">\n' +
                '                        <a target="_blank" id="redirectToProfile" class="text-dark" href="profile/'+first + '-' + surname + '-' + id+'">\n' +
                '                            <img class="mt-2 mb-2 w-100" id="selected" src="files/upload/'+e.user[0].mainPhoto+'">\n' +
                '                            <p id="nameUser" class="text-center">'+ e.user[0].firstName + ' ' + e.user[0].surname+'</p>\n' +
                '                        </a>\n' +
                '                    </div>'
            )
        }
    });
}