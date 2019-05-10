@foreach ($services as $service)
    <div class="product_box">
        <div style="overflow: hidden;height: 30px;"><h3>{{$service->s_name}}</h3></div>
        <div style="overflow: hidden;height: 150px;"><a href="{{url('ServiceView/'.$service->s_id)}}"><img src="{{URL::to('/images').'/'.$service->s_image}}" alt="{{$service->s_name}}" width="150" /></a></div>
        <div style="overflow: hidden;height: 100px;"><p>{{$service->s_description}}</p></div>
        <div style="overflow: hidden;height: 30px;"><p class="product_price">{{$service->s_cost}}руб.</p></div>
        <div style="overflow: hidden;height: 100px;"><a href="{{url('CartAdd/'.$service->s_id)}}" class="addtocart"></a>
        <a href="{{url('ServiceView/'.$service->s_id)}}" class="detail"></a></div>
    </div>
@endforeach