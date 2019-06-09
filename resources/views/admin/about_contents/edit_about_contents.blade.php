@extends('layouts.adminLayout.admin_design')

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="index.html" class="tip-bottom" data-original-title="Go to Home">
                    <i class="icon-home"></i>
                    Home
                </a>
                <a href="index.html" class="tip-bottom" data-original-title="Header contents section">
                    <i class="icon-home"></i>
                    About Content
                </a>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row-fluid">
                <h4 class="header">Change About Section</h3>
                <p>You are about to change the content of your about section.</p>
                @include('inc.messages')
                <div class="form-wrapper">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-align-justify"></i>
                            </span>
                            <h5>About Contents</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {!! Form::open(['action' =>['AboutContentsController@update', $about->id], 'method' => "POST", 'class' => 'form-horizontal']) !!}
                                {{ Form::dhText('aboutTitle', $about->about_title, ['placeholder' => 'Title to be seen ']) }}
                                {{ Form::dhText('about_Caption', $about->about_caption, ['placeholder' => 'Caption below the title']) }}
                                {{ Form::dhTextArea('about_Content', $about->about_content, ['placeholder' => 'e.g. description about hotel']) }}
                                {{ Form::hidden('_method', 'PUT') }}
                                {{ Form::dhSubmit('Submit', ['class' => 'btn btn-success']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>                           
            </div>
        </div>    
    </div>
    
@endsection