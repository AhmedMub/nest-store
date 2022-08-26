<div wire:ignore.self class="panel-collapse collapse" id="updateDetails">
    <div class="panel-body">
        <div class="row">
            <h4 class="mb-30">Billing Details</h4>
            <form wire:submit.prevent="update" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input wire:model="first_name" class="{{$errors->has('first_name')?'is-invalid':''}}"
                            type="text" placeholder="First name *">
                        <x-defaults.input-error for="first_name" />
                    </div>
                    <div class="form-group col-lg-6">
                        <input wire:model="first_name" type="text" name="lname" placeholder="Last name *">
                        <x-defaults.input-error for="first_name" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="billing_address" placeholder="Address *">
                        <x-defaults.input-error for="first_name" />
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" name="billing_address2" placeholder="Address line2">
                        <x-defaults.input-error for="first_name" />
                    </div>
                </div>
                <div class="row shipping_calculator">
                    <div class="form-group col-lg-6">
                        <div wire:ignore class="custom_select">
                            <select class="form-control select-active-auth">
                                <option value="">Select country...</option>
                                @if (count($countries) > 0)
                                @foreach ($countries as $country)
                                <option value="{{$country->id}}">{{$country->country}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <x-defaults.input-error for="first_name" />
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="custom_select">
                            <div class="custom_select">
                                <select wire:model="district" class="form-control fix-height">
                                    <option style="background-color:red;color:#4e46e5;">Select district...</option>
                                    @if (isset($districts))
                                    @foreach ($districts as $district)
                                    <option value="{{$district->id}}">
                                        {{$district->district}}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                <x-defaults.input-error for="first_name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="zipcode" placeholder="Postcode / ZIP *">
                        <x-defaults.input-error for="first_name" />
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" name="phone" placeholder="Phone *">
                        <x-defaults.input-error for="first_name" />
                    </div>
                </div>
                <div class="form-group mb-30">
                    <textarea rows="5" placeholder="Additional information"></textarea>
                    <x-defaults.input-error for="first_name" />
                </div>
                <button type="submit" class="btn btn-fill-out btn-block">
                    {{__('frontend/checkout.Update Details')}}<i class="fa-solid fa-arrows-rotate ml-15"></i></button>
            </form>
        </div>
    </div>
</div>


@push('added-scripts')
<script>
    $(function() {
        $('.select-active-auth').select2({
            width: '100%'
        });
        $('.select-active-auth').on('change', function (e) {
            var data = $('.select-active-auth').select2("val");
            @this.set('country', data);
        });
    });
</script>
@endpush
