@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h5 class="card-title"> Edit My Account </h5>
<p class="card-text">
<form action="{{ route('account.update', Auth::user()->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="exampleInputName"> Name </label>
        <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ Auth::user()->customer->name }}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail"> Email  </label>
        <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ Auth::user()->email }}"l>
    </div>
     <div class="form-check">
    <label class="form-check-label" for="exampleCheck1"></label>
    </div></p>
    <button class="float-right btn btn-primary" type="submit">Submit</button>
</form>