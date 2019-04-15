@extends('itemview.front')

@section('content')
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Ask your question</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert"
                               aria-label="close">&times;</a>
                            {{ session()->get('message') }}
                        </div>
                    @endif


                    @if(isset($errors) && !empty($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>


            <div class="row">

                <div class="col-lg-8 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    {{ Form::model('question', ['enctype'=>"multipart/form-data",'novalidate'=>"novalidate",'id'=>'contactForm']) }}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Email Address</label>
                            {{Form::email('email',isset($data['email']) ? $data['email'] : null, array('class'=>'form-control',"id"=>"email","placeholder"=>"Email Address","required"=>"required","data-validation-required-message"=>"Please enter your email address."))}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Question</label>
                            {{Form::textarea('question',isset($data['question']) ? $data['question'] : null, array('maxlength'=>100,'class'=>'form-control',"id"=>"question","placeholder"=>"Question","required"=>"required","data-validation-required-message"=>"Please enter a Question."))}}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>

    </script>
@endsection
