<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Kelurahan</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
    <a href="{{ URL::previous() }}">Cancel</a>
</form>
