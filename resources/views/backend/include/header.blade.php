
<div class="col-md-6">
    <header class="header-area">
        <nav>
            <ul>
                <li><a href="{{ route('products.index')}}" class="btn btn-sm btn-info">Products</a></li>
                <li><a href="{{ route('brand.index') }}" class="btn btn-sm btn-danger">Brand</a></li>
                <li><a href="{{ route('category.index') }}" class="btn btn-sm btn-success">Categorys</a></li>
            </ul>
        </nav>
    </header>
</div>

<div class="col-5 d-none d-md-block">
    <div class="header">
        <form style="margin-top:7px" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
    </div>

</div>


