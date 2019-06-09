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
                <p>Please hit edit below to change the contents of header section in the website</p>
                
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
                            <div class="form-horizontal">
                                <div class="control-group">
                                    <label for="Main Title" class="control-label">Main Title:</label>
                                    <div class="controls">
                                        <p class="span11" style="padding: 5px;">{{ $header->main_title }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="control-group">
                                    <label for="Title Caption" class="control-label">Title Caption:</label>
                                    <div class="controls">
                                        <p class="span11" style="padding: 5px;">{{ $header->title_caption }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="control-group">
                                    <label for="Call To Action Text" class="control-label">Call To Action Text:</label>
                                    <div class="controls">
                                        <p class="span11" style="padding: 5px;">{{ $header->call_to_action_text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <a href="/admin/header_contents/{{ $header->id }}/edit" class="btn btn-info">Edit</a>              
            </div>
        </div>    
    </div>
    
@endsection