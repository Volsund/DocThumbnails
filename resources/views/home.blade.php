@extends('layouts.app')

@section('content')

    <div id="main-heading" class="text-center shadow">
        <h1>Document Manager</h1>
    </div>
    <div class="container">

        <div class="panel panel-primary w-50 upload-doc-container">
            <div class="panel-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="file" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload Document</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
        <div class="doc-container ">
            @foreach($documents as $document)
                <div class="document-thumbnail ">
                    <img data-toggle="modal" data-target="{{'#doc-modal'.$document->id}}" class="shadow" id="doc-img"
                         src="{{url('/thumbnails/'.$document->thumbnail)}}" alt="Image"/>
                </div>

                <!-- Document Modal -->
                <div id="{{'doc-modal'.$document->id}}" class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="vertical-alignment-helper">
                        <div class="modal-dialog vertical-align-center">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Document preview</h4>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                <div class="modal-body">

                                    <embed src="{{url('/uploads/'.$document->name)}}" frameborder="0" width="100%"
                                           height="800px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection
