@extends('back.layouts.app')
@section('title','Main Categories')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> List Of Main Main Categories </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('maincat.create') }}" class="btn btn-primary">Create New Maincat.</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>Category View</th>
                                    <th>Action</th>
                               </tr>
                                 @foreach(App\Category::with('subcat')->where('parent_id',0)->get() as $attr)
                                 <tr>
                                     <td>
                                         {{ $attr->name }}
                                            @if (count($attr->subcat))
                                                @foreach ($attr->subcat as $item)
                                                    <ul>
                                                        <li>{{ $item->name }}
                                                            <form action="{{ route('maincat.destroy',$item->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="badge badge-danger" onclick="return confirm('Are You Sure?');">Del</button>
                                                            </form>
                                                        </li>
                                                        @if (count($item->subcat))
                                                            @foreach ($item->subcat as $item1)
                                                                <ul>
                                                                    <li>{{ $item1->name }}
                                                                        <form action="{{ route('maincat.destroy',$item->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="badge badge-danger" onclick="return confirm('Are You Sure?');">Del</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                @endforeach
                                            @endif
                                      </td>
                                      <td>
                                          <form action="{{ route('maincat.destroy',$attr->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="badge badge-danger" onclick="return confirm('Are You Sure?');">Delete</button>
                                          </form>
                                      </td>
                                  </tr>

                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $cats->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
