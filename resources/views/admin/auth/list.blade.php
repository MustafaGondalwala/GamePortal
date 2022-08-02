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
            <div class="content-header">{{ __('Admin') }}</div>
         </div>
      </div>
      <section id="file-export">
         <div class="row">
           <div class="col-12">
             <div class="card">
               <div class="card-header">
                 <div class="card-tools">
                 <a href="{{route('admin.add')}}" class="btn btn-primary float-right">
                    Add
                  </a>
                </div>
               </div>
               <div class="card-content">
                 <div class="card-body">
                  @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  <form method="get">
                    @csrf
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered file-export">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($all_admins as $key => $value)
                             <tr>
                                 <td>{{ $value->id }}</td>
                                 <td>{{ $value->name }}</td>
                                 <td>{{ $value->email }}</td>
                                 <td>{{ $value->status == 1 ? 'Active' : 'InActive' }}</td>
                                 <td>
                                   <a class="btn btn-sm btn-warning" href="{{ route('admin.edit',['id'=>encrypt_param($value->id)]) }}">Edit</a>
                                   <form method="POST" action="{{ route('admin.delete',['id' => encrypt_param($value->id) ] )}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete" />
                                        </div>
                                    </form>
                                 </td>
                             </tr>
                          @endforeach
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
   $('.file-export').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "order": [[ 0, 'desc' ],]
  });
  $('.dt-buttons').addClass('btn-group');
  $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mb-2');
</script>
@endsection
