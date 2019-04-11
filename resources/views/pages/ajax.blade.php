<!DOCTYPE html>
<html>
<head>

    <!-- load jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $(".postbutton").click(function(){
                $.ajax({
                /* the route pointing to the post function */
                    url:'{{url("postajax")}}' ,
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        $(".writeinfo").append(data.msg);
                    }
                });
            });
        });
    </script>

</head>

<body>
<input class="getinfo"></input>
<button class="postbutton">Post via ajax!</button>
<div class="writeinfo"></div>
</body>

</html>