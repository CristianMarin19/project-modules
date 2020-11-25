<div class="products-list">

	@includeFirst(['icommerce.index.top-content.index',
				'icommerce::frontend.index.top-content.index'])

	<div class="products">
		<div class="row">
			
			@include('icommerce::frontend.partials.preloader')
			
			@if(isset($products) && count($products)>0)

				@foreach($products as $product)
				<div class="{{$layoutClass}} products">

					@if($mainLayout=='one')
						@includeFirst(['icommerce.product.layout-one','icommerce::frontend.product.layout-one'])
					@else
						@includeFirst(['icommerce.product.layout','icommerce::frontend.product.layout'])
					@endif

				</div>
				@endforeach

				<div class="product-list-pagination d-flex w-100 px-3 mt-4 justify-content-end">
					{{ $products->links() }}
				</div>
				

			@else
				<div class="col-12">
					<div class="alert alert-danger my-5" role="alert">
					  {{trans('icommerce::common.messages.no products')}}
					</div>
				</div>
			@endif
			
		</div>
	</div>

</div>

@section('scripts')
@parent
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('urlChange', (param) => {
           	history.pushState(null, null, `${document.location.pathname}?${param}`);
        });
    });
</script>
<script type="text/javascript">
	console.warn("Componente: Products List - Start")

	jQuery(document).ready(function($) {
		window.livewire.emit('productListRendered',{!! json_encode($params) !!});
	});
</script>
@stop