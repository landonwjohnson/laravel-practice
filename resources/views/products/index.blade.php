<h1>All Products </h1>

<a href="/products/create"> Add new </a>

<ul>
    @foreach ($products as $product)
        <li>
            <a href="/products/{{$product['id']}}">
             {{$product['name']}} {{$product['price']}} 
            </a>
        </li>
    @endforeach 

</ul>