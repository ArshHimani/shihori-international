@foreach($products as $product)
    <tr>
        <td><img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}"></td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->product_title }}</td>
        <td>{{ $product->product_type }}</td>
        <td>
            <a href="{{ route('product.update', $product->id) }}">
                <i class="info-icon fas fa-info-circle"></i>
            </a>
        </td>
        <td>
            <span onclick="confirmDelete({{ $product->id }})">
                <i class="fa fa-trash"></i>
            </span>
            <form id="delete-form-{{ $product->id }}" action="{{ route('product.delete', $product->id) }}" method="GET" style="display:none;">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
@endforeach
