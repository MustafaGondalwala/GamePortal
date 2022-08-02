@extends('admin.layout.app')
@section('content')
@php
$user = Auth::user();
@endphp

<div class="main-content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="row">
         <div class="col-12">
            <div class="content-header">Game</div>
         </div>
      </div>
      <section id="questionTable">
         <div class="row">
           <div class="col-12">
             <div class="card">
               <div class="card-header">
                    <div class="card-tools">
                        <a href="{{route('admin.game.add')}}" class="btn btn-primary float-right">
                            Add
                        </a>
                    </div>
               </div>
               <div class="card-content">
                 <div class="card-body">
                  @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show">
                      {{ session()->get('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  @if(session()->has('error'))
                    <div class="alert alert-warning alert-dismissible fade show">
                        {{ session()->get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-sm-6">
                        <label>Name</label>
                        <input type="text" class="form-control" id="title" />
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 col-sm-6">
                        <label>
                            <button class="btn find btn-primary">Find</button>
                            <button class="btn reset btn-warning">Reset</button>
                            @can('project.export')
                                <button class="btn export btn-warning">Export</button>
                            @endcan
                        </label>
                    </div>
                </div>
                  <form method="get">
                    @csrf
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered questionTable">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </form>
                 </div>
               </div>
             </div>
            </div>
         </div>
       </section>
   </div>
</div>
</div>
<!-- Striped Row Form Layout ends -->
</div>
</section>
<!-- Bordered & Striped Row Form Layout ends -->
</div>
</div>
@endsection
@section('footer')
<script>
    $('.find').click(function(){
        $('.questionTable').DataTable().draw(true);
    });
    $('.reset').click(function(){
         $("#title").val("");
        $('.questionTable').DataTable().draw(true);
    });
    $(".export").click(function(){
        var data = {};
        data.title = $('#title').val();
        const params = objectToParams(data);
        window.location.href = "{{ route('admin.game.export') }}?"+params;
    })

    $('.questionTable').DataTable({
    "serverSide": true,
    "searching": false,
    "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name',orderable: false},
            {data: 'status', name: 'status',orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
    ],
    "ajax": {
        url: "{{route('admin.game.list',['ajax'=>'true'])}}",
        type: 'GET',
        data: function (d) {
           d.title = $("#title").val();
        }
      },
  });
</script>
@endsection
