@extends('layouts.app')
@section('content')
        <form action="{{route('admin.leads.store')}}" method="post">
        @csrf
        @method('post')
       <div class="row">
           <div class="col-12">
               <div class="mb-3 row">
                   <label for="staticName" class="col-sm-2 col-form-label">{{__('base.name')}}</label>
                   <div class="col-sm-6">
                       <input type="text" name="name" class="form-control" id="staticName" >
                       @error('name')
                           {{$message}}
                       @enderror
                   </div>

               </div><div class="mb-3 row">
                   <label for="staticEmail" class="col-sm-2 col-form-label">{{__('base.email')}}</label>
                   <div class="col-sm-6">
                       <input type="email" name="email"  class="form-control" id="staticEmail" >
                       @error('email')
                       {{$message}}
                       @enderror</div>

               </div><div class="mb-3 row">
                   <label for="staticcompany"  class="col-sm-2 col-form-label">{{__('base.company')}}</label>
                   <div class="col-sm-6">
                       <input type="text" name="company"  class="form-control" id="staticcompany" >
                       @error('company')
                       {{$message}}
                       @enderror</div>

               </div>
               <div class="mb-3 row">
                   <label for="staticPhone" class="col-sm-2 col-form-label">{{__('base.phone')}}</label>
                   <div class="col-sm-6">
                       <input type="text" name="phone" class="form-control" id="staticPhone" >
                       @error('phone')
                       {{$message}}
                       @enderror</div>

               </div>
               <div class="mb-3 row">
                   <label for="staticComment" class="col-sm-2 col-form-label">{{__('base.comment')}}</label>
                   <div class="col-sm-6">
                       <textarea name="comment" class="form-control" id="staticComment"></textarea>
                       @error('comment')
                       {{$message}}
                       @enderror
                   </div>
               </div>
               <div class="mb-3 row">
                   <label for="staticSource" class="col-sm-2 col-form-label">{{__('base.source')}}</label>
                   <div class="col-sm-6">
                       <input type="text" name="source" class="form-control" id="staticSource" >
                       @error('source')
                       {{$message}}
                       @enderror</div>

               </div>
               <div class="mb-3 row">
                   <label for="staticStage" class="col-sm-2 col-form-label">{{__('base.stage')}}</label>
                   <div class="col-sm-6">
                       <select name="stage" class="form-control" id="staticStage" >
                            <option value="website">Website</option>
                            <option value="phone">Phone</option>
                            <option value="email">Email</option>
                       </select>
                       @error('source')
                       {{$message}}
                       @enderror
                   </div>

               </div>
           </div>
       </div>
        <button class="btn btn-success">{{__('button.create')}}</button>
    </form>


<table class="table">
    <thead>
        <th>id</th>
        <th>{{__('base.name')}}</th>
        <th>{{__('base.email')}}</th>
        <th>{{__('base.company')}}</th>
        <th>{{__('base.phone')}}</th>
        <th>{{__('base.comment')}}</th>
        <th>{{__('base.source')}}</th>
        <th>{{__('base.stage')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($leads as $lead)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$lead->name}}
            </td>
            <td>
                {{$lead->email}}
            </td>
            <td>
                {{$lead->company}}
            </td>
            <td>
                {{$lead->phone}}
            </td>
            <td>
                {{$lead->stage}}
            </td>
            <td>
                {{$lead->source}}
            </td>
            <td>
                <form action="{{route('admin.leads.destroy',$lead->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>






@endsection
