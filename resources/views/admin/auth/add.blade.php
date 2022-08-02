@extends('admin.layout.app')
@section('content')
@php
$user = Auth::user();
@endphp

<div class="main-content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="row">
         <div class="">
            <div class="content-header">{{ __('Admin') }}</div>
         </div>
      </div>
      <section id="basic-hidden-label-form-layouts">
         <div class="row match-height">
            <div class="col-lg-12 ">
               <div class="card" >
                  <div class="card-header">
                     <h4 class="card-title">
                        <a href="{{route('admin.list')}}" class="btn btn-primary float-right">
                            Back
                        </a>
                     </h4>
                  </div>
                  <div class="card-content">
                     <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                           @csrf
                           @if(count($errors) > 0 )
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <ul class="p-0 m-0" style="list-style: none;">
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                              @endif

                              <div class="col-md-6 ">
                                 <div class="form-group mb-2">
                                  <label for="name">Name</label>
                                  <input type="text" id="name" class="form-control"  value="{{ old('name',@$form_data->name) }}"  name="name">
                                  </div>
                              </div>
                              <div class="col-md-6 ">
                                 <div class="form-group mb-2">
                                  <label for="email">Email</label>
                                  <input type="text" id="email" class="form-control"  value="{{ old('email',@$form_data->email) }}"  name="email">
                                  </div>
                              </div>
                              <div class="col-md-6 ">
                                 <div class="form-group mb-2">
                                  <label for="password">Password</label>
                                  <input type="password" id="password" class="form-control" name="password">
                                  </div>
                              </div>
                              <div class="col-md-6 ">
                                <div class="form-group mb-2">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="" disabled>Select</option>
                                        <option value="1" <?php if($id != null && $form_data->status=='1'){ echo 'selected'; }?>>Active</option>
                                        <option value="0" <?php if($id != null && $form_data->status=='0'){ echo 'selected'; }?>>InActive</option>
                                    </select>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary mr-2"><i class="ft-check-square mr-1"></i>Save</button>
                        </form>
                     </div>
                  </div>
               </div>
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
@endsection
