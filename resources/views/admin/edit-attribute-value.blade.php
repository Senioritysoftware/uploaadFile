<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
@include('admin.stylesheet')
</head>
<body>
@include('admin.navigation')
<!-- Right Panel -->
    @if(in_array('products',$avilable))
    <div id="right-panel" class="right-panel">
       @include('admin.header')
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Attribute Value</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        @if (session('success'))
        <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="col-sm-12">
             <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             @foreach ($errors->all() as $error)
             {{$error}}
             @endforeach
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
             </button>
             </div>
            </div>   
         @endif
         <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                       @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                       <form action="{{ route('admin.edit-attribute-value') }}" method="post" id="setting_form" enctype="multipart/form-data">
                       {{ csrf_field() }}
                        @endif
                        <div class="card">
                         <div class="col-md-8">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Attribute Type<span class="require">*</span></label>
                                                <select name="attribute_type" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                @foreach($typeData['view'] as $type)
                                                <option value="{{ $type->attribute_id }}" @if($edit['value']->attribute_id == $type->attribute_id) selected @endif>{{ $type->attribute_name }}</option>
                                                @endforeach
                                                </select>
                                            </div> 
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Attribute Value <span class="require">*</span></label>
                                                <input id="attribute_value" name="attribute_value" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['value']->attribute_value }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="attribute_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['value']->attribute_value_status == 1) selected @endif>Active</option>
                                                <option value="0" @if($edit['value']->attribute_value_status == 0) selected @endif>InActive</option>
                                                </select>
                                            </div>   
                                            <input type="hidden" name="attribute_value_id" value="{{ $attribute_value_id }}">
                                    </div>
                                </div>
                              </div>
                            </div>
                           <div class="col-md-6">
                           </div>
                           <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                     <i class="fa fa-dot-circle-o"></i> Submit
                                 </button>
                                 <button type="reset" class="btn btn-danger btn-sm">
                                     <i class="fa fa-ban"></i> Reset
                                 </button>
                           </div>
                        </div> 
                     </form> 
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->
   @include('admin.javascript')
</body>
</html>