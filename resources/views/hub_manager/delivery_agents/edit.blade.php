@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Delivery Agent : {{ $delivery_agent->name }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route('hub_manager.delivery_agents.update', $delivery_agent) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="image">Profile image</label>
                  <div class="d-flex gap-1 align-items-start">
                    <img src="{{ $delivery_agent->profile->imgSrc($delivery_agent->profile->image) }}" alt="image"
                      width="40" height="40" class="border rounded-circle">
                    <input type="file" id="image" class="form-control" name="image" value="">
                  </div>
                  @error('image') <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="name">name</label>
                  <input type="text" id="name" class="form-control" name="name" value="{{ $delivery_agent->name }}">
                  @error('name')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="email">email</label>
                  <input type="text" id="email" class="form-control" name="email" value="{{ $delivery_agent->email }}">
                  @error('email')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="phone">phone</label>
                  <input type="text" id="phone" class="form-control" name="phone" value="{{ $delivery_agent->phone }}">
                  @error('phone')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="alt_phone">alt_phone</label>
                  <input type="text" id="alt_phone" class="form-control" name="alt_phone"
                    value="{{ $delivery_agent->profile->alt_phone }}">
                  @error('alt_phone')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="country">country</label>
                  <select name="country" id="" class="form-control">
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @if ($delivery_agent->profile &&
                      $delivery_agent->profile->country_id
                      == $country->id )
                      selected
                      @endif
                      >{{ $country->name }}</option>
                    @endforeach
                  </select>
                  @error('country')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="state">state</label>
                  <select name="state" id="" class="form-control">
                    @foreach ($states as $state)
                    <option value="{{ $state->id }}" @if ($delivery_agent->profile &&
                      $delivery_agent->profile->state_id
                      == $state->id )
                      selected
                      @endif
                      >{{ $state->name }}</option>
                    @endforeach
                  </select>
                  @error('state')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="city">city</label>
                  <input type="text" id="city" class="form-control" name="city"
                    value="{{ $delivery_agent->profile->city }}">
                  @error('city')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="address">address</label>
                  <textarea id="address" class="form-control" name="address"
                    rows="5">{{ $delivery_agent->profile->address }}</textarea>
                  @error('address')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="postcode">postcode</label>
                  <input type="text" id="postcode" class="form-control" name="postcode"
                    value="{{ $delivery_agent->profile->postcode }}">
                  @error('postcode')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="aadhar_number">aadhar_number</label>
                  <input type="text" id="aadhar_number" class="form-control" name="aadhar_number"
                    value="{{ $delivery_agent->profile->aadhar_number }}">
                  @error('aadhar_number')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="id_proof">id_proof</label>
                  <br>
                  <img src="{{ $delivery_agent->profile->imgSrc($delivery_agent->profile->id_proof) }}" alt="id_proof"
                    width="200" class="my-2">
                  <input type="file" id="id_proof" class="form-control" name="id_proof" value="">
                  @error('id_proof')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="driving_licence">driving_licence</label>
                  <br>
                  <img src="{{ $delivery_agent->profile->imgSrc($delivery_agent->profile->driving_licence) }}"
                    alt="id_proof" width="200" class="my-2">
                  <input type="file" id="driving_licence" class="form-control" name="driving_licence" value="">
                  @error('driving_licence')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status"
                      @if ($delivery_agent->status) checked @endif>
                    <label class="form-check-label" for="inlineCheckbox1">Status</label>
                  </div>
                  @error('status')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="password">password</label>
                  <input type="text" id="password" class="form-control" name="password" autocomplete="off">
                  @error('password')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="password_confirmation">password_confirmation</label>
                  <input type="text" id="password_confirmation" class="form-control" name="password_confirmation"
                    autocomplete="off">
                  @error('password_confirmation')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection