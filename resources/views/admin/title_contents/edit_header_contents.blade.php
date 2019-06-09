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
                    Header Content
                </a>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row-fluid">
                <h4 class="header">Change Header Section</h3>
                <p>You are about to change the content of your header section.</p>
                @include('inc.messages')
                <div class="form-wrapper">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-align-justify"></i>
                            </span>
                            <h5>Header Contents</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {!! Form::open(['action' =>['TitleContentsController@update', $header->id], 'method' => "POST", 'class' => 'form-horizontal']) !!}
                                {{ Form::dhText('mainTitle', $header->main_title, ['placeholder' => 'Title to be seen in front page']) }}
                                {{ Form::dhText('title_Caption', $header->title_caption, ['placeholder' => 'Caption below the title']) }}
                                {{ Form::dhText('call_To_Action_Text', $header->call_to_action_text, ['placeholder' => 'e.g. Book A Room']) }}
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