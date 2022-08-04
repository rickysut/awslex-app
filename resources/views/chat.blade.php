@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <h2>{{ __('Press button to start chat') }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div id="chat-circle" class="btn btn-raised">
            <div id="chat-overlay"></div>
                <i class="fa fa-comments-o"></i>
            </div>
            
            <div class="chat-box">
                <div class="chat-box-header">
                    Lex is here, lets chat!
                    <span class="chat-box-toggle">
                    <i class="fa fa-times"></i></span>
                </div>
                <div class="chat-box-body" >
                    
                    <div class="chat-box-overlay">   
                    </div>
                    
                    <div class="chat-logs" id="chatbox" ref="scrollParent">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                </div>
                <div class="chat-input">     
                    <chat-form
                        v-on:sent="addMessage"
                        v-on:clear="clearMessages"
                        :user="{{ Auth::user() }}"
                        ></chat-form> 
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script> 

    $(function() {
    
    $("#chat-circle").click(function() {    
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    })
    
    $(".chat-box-toggle").click(function() {
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    })

    })
</script>
@endsection