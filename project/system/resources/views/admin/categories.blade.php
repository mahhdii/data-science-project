@extends('admin.master')


@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Campaigns</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Campaigns</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <button data-toggle="modal" id="modal-trigger" data-target="#category_modal"  class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"> New Campaign</button>
        </div>
    </div>



    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Campaigns</h4>
                    <h6 class="card-subtitle">List of all student campaigns</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($categories as $category)
                                  <tr>
                                      <td>{{$category->id}}</td>
                                      <td>{{$category->category_name}}</td>
                                      <td><button class="btn btn-primary waves-effect edit-btn" data-cat-name="{{$category->category_name }}" data-id="{{$category->id}}">Edit</button> </td>
                                      <td><button class="btn btn-danger waves-effect delete-btn" data-id="{{$category->id}}" >Delete</button> </td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Delete form--}}
     <form method="post" class="d-none" id="delete_form">
         @csrf
         @method('delete')
     </form>

    <!-- ==================================================  -->
    <!-- New category Modal -->
    <!-- ======================================== -->



    <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal form-material" id="category_form" action="{{route('category.add')}}" method="post">
                @csrf
                {{--@method("PATCH")--}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Campaign</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">



                        <div class="form-group">
                            <label class="col-md-12">Category Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="category_name">
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ================================================= -->
    <!-- End  Category Modal -->
    <!-- =========================================================== -->






@endsection


@section('scripts')
    @parent
    <script>
        var newBtn = $("#modal-trigger");
        var editBtn = $(".edit-btn");
        var deleteBtn = $(".delete-btn");
        var modal = $('#category_modal');
        var input =  $('input[name="category_name"]');
        var updateUrl = "{{ route('category.add') }}";
        var form = $("#category_form");



        editBtn.click(function (ev) {
             var target = $(ev.target);
             modal.modal('show');
             input.val(target.data('cat-name'));
             form.append($('<input type="hidden" name="_method" value="PATCH">'));
             form.attr('action',updateUrl+"/"+target.data('id'));
        });


        newBtn.click(function (){
           $("input[name='_method']").remove();
           input.val('');
           form.attr('action',updateUrl);
        });





        deleteBtn.click(function (ev) {
            var yes = confirm("Do you want to delete category");
            if(yes){
                var form = $("#delete_form");
                form.attr('action',updateUrl+"/"+$(ev.target).data('id'));
                form.submit();
            }
        });






    </script>


@endsection