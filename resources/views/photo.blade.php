<form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit" name="subnit">Upload</button>
</form>