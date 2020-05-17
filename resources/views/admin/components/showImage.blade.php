<hr>
<br>
<hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Model_id</th>
      <th scope="col">Image</th>
      <th scope="col">option</th>

    </tr>
  </thead>
  <tbody>
  @if(is_array($allMedia))
    @foreach($allMedia as $media)
      @foreach($media as $image)
      <tr>
          <td>{{$image->id}}</td>
          <td>{{$image->model_id}}</td>
          <td>{{asset($image->url)}}</td>
          <td> <a href="javascript:;" class="btn btn-danger btn-xs delete-modal-btn" data-url="{{ route('admin.services.destroy', $image->id) }}" >
                    <span class="fa fa-trash"></span>
                </a></td>
      </tr>
      @endforeach
      @endforeach
  @else
  <tr>
    <td>{{asset($allMedia)}}</td> 
</tr>
@endif
      </tbody>
</table>