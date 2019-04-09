<section class="contactus" id="contactus">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <div class="container">
        <div class="title-center-heading">
            <h2>Contact us </h2>
        </div>
        <form action="{{url('/enquiry')}}" method="post">
            {{ csrf_field() }}
            <div class="contact-form">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="alert alert-success print-success-msg" style="display:none">
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Name </label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}"/>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Email </label>
                            <input type="email" class="form-control" placeholder="Email" name="contemail" value="{{old('contemail')}}"/>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Mobile </label>
                            <input type="text" class="form-control" placeholder="Mobile" name="contmobile" value="{{old('contmobile')}}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Subject </label>
                <input type="text" class="form-control" placeholder="Subject" name="subject" value="{{old('subject')}}"/>
            </div>
            <div class="form-group">
                <label>Message </label>
                <textarea rows="4" cols="50" class="form-control" placeholder="Message" name="message">{{old('message')}}</textarea>
            </div>
            <div class="form-group">
                <div class="text-center"><button  type="button" class="btn btn-primary btn-contact">Submit</button></div>
            </div>
    </div>
    </form>
    // Jquery library
    <script>
        //Form post code
        $(document).ready(function() {
            // on button click we are getting values by input name.
            $(".btn-contact").click(function(e){

                e.preventDefault();
                var _token = $("input[name='_token']").val(); // get csrf field.
                var name = $("input[name='name']").val();
                var contemail = $("input[name='contemail']").val();
                var contmobile = $("input[name='contmobile']").val();
                var subject = $("input[name='subject']").val();
                var message = $("textarea[name='message']").val();

                $.ajax({

                url: "<?php echo url('ajax');?>",
                    type:'POST',
                    data: {_token:_token, name:name, contemail:contemail, contmobile:contmobile, subject:subject, message:message},
                    success: function(data) {
                        // No error empty the field and previous error msg if any.

                        console.log('success');
                        if($.isEmptyObject(data.error)){
                            $(".print-error-msg").find("ul").html('');
                            $(".print-error-msg").css('display','none');
                            $(".print-success-msg").html('');
                            $(".print-success-msg").css('display','block');
                            $(".print-success-msg").html(data.success);
                            $("input[name='name']").val('');
                            $("input[name='contemail']").val('');
                            $("input[name='contmobile']").val('');
                            $("input[name='subject']").val('');
                            $("textarea[name='message']").val('');
                        }else{
                            errorMsg(data.error);
                        }
                    }
                });
            });
            // Function to show error messages
            function errorMsg (msg) {
                $(".print-success-msg").find("ul").html('');
                $(".print-success-msg").css('display','none');
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });
    </script>
</section>
<!-- /.End -->