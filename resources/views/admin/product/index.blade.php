@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Products List Manage</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      
                @php
                $countprods = count($prods);
                @endphp
      <h3 class="card-title">Having : {{$countprods}}  Products in List</h3>
      
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 5%">Id</th>
                  <th style="width: 10%">Category</th>
                  <th style="width: 10%">Brand</th>
                  <th style="width: 20%">Name</th>
                  <th style="width: 5%">Regular Price</th>
                  <th style="width: 5%">Sale Price (%)</th>  
                  <th style="width: 5%">Status</th>
                  <th style="width: 5%">Featured</th>
                  <th style="width: 5%">Stock</th>
                  <th style="width: 5%">Image</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($prods as $item)
              <tr>
                  <td>{{ $item->id }}</td>
                  @php
                  $namecate = DB::table('categories')->where('id',"=",$item->categorie_id)->value('categorie_name');
                  $namebrand = DB::table('brands')->where('id',"=",$item->brand_id)->value('brand_name');

                  @endphp
                  <td>{{ $namecate}}</td>
                  <td>{{ $namebrand}}</td>  
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->price }} $</td>
                  <td>{{ $item->sale_price }} %</td>
                  <td>{{ $item->status }}</td>
                  <td>{{ $item->featured }}</td>
                  <td>{{ $item->stock }}</td>
                  <td>
                    @if (!empty($item->image))
                    <img src="{{asset('images/'.$item->image)}}" alt="{{$item->name}}" style="width: 100px; height:auto">
                    @endif
                  </td>

                  <td class="project-actions text-right">
                    
                      <!-- <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a> -->
                      <a class="btn btn-info btn-sm" href="{{ Route('admin.product.edit', $item->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <form action="{{ Route('admin.product.destroy', $item->id) }}" method="post" style="display:inline-block">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                      </form>
                  </td>
                  
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection