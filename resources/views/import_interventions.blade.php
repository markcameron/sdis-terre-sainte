<form action="{{ route('imports.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="json" />
    <button type="submit">Submit</button>
</form>
