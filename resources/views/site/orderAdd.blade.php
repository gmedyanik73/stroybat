@include('site.layouts._layout')

@section('content')
<div id="templatemo_main">
    <div class="row justify-content-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <h1>{{ 'Оформление заказа улуги '.$orderParams->s_name }}</h1>

                <div class="customForm2">
                        <a href="{{URL::to('/images').'/'.$orderParams->s_image}}"><img src="{{URL::to('/images').'/'.$orderParams->s_image}}" alt="{{ $orderParams->s_name }}" width="400" /></a>
                        <div><p>{{'Описание: '.$orderParams->s_description}}</p></div>
                    <form method="POST" name="add" id="add" action="{{route('OrderInsert')}}" aria-label="{{ __('Оформление заказа') }}">
                        @csrf
                        @if (isset($orderParams->c_id)) <input type="hidden" name="c_id" value="{{ $orderParams->c_id }}" form="add"> @endif
                        @if (isset($orderParams->s_id)) <input type="hidden" name="s_id" value="{{ $orderParams->s_id }}" form="add"> <input type="hidden" name="count" value="{{ $o_count }}" form="add"> @endif
                        <input type="hidden" name="o_service" value="{{$orderParams->s_id}}" form="add">
                        <div class="row">
                            <label for="o_count" class="col-md-4 col-form-label text-md-right">{{ __('Количество') }}</label>
                            <input id="o_count" type="text" class="form-control{{ $errors->has('o_count') ? ' is-invalid' : '' }}" name="o_count" value="{{ $o_count }}" form="add" required readonly>{{ $orderParams->unit_name }}
                            @if ($errors->has('o_count'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('o_count') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div>
                            <label for="o_sum" class="col-md-4 col-form-label text-md-right">{{ __('Сумма к оплате') }}</label>
                                <input id="o_sum" type="text" class="form-control{{ $errors->has('o_sum') ? ' is-invalid' : '' }}" name="o_sum" value="{{ $o_sum }}" form="add" readonly>

                                @if ($errors->has('o_sum'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('o_sum') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div>
                            <label for="o_pay" class="col-md-4 col-form-label text-md-right">{{ __('Оплатить') }}</label>
                                <input id="o_pay" type="text" class="form-control{{ $errors->has('o_pay') ? ' is-invalid' : '' }}" name="o_pay" value="{{ old('o_pay') }}" form="add" required>

                                @if ($errors->has('o_pay'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'Сумма оплаты должна совпадать с суммой заказа' }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div>
                                <button type="submit">
                                    {{ __('Заказать услугу!') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@show
@include('site.layouts.footer')