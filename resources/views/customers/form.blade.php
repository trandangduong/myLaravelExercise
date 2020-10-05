<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $customer->name}}" class="form-control">
    <div>{{$errors->first('name') }}</div>
</div>
           
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
    <div>{{$errors->first('email') }}</div>
</div>

<div class="form-group">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select Customer status</option>

        @foreach ($customer->activeOptions() as $activeOptionsKey => $activeOptionsValue)
            <option value="{{$activeOptionsKey}}" {{$customer->active == $activeOptionsValue ? 'selected':''}}>{{$activeOptionsValue}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
    @foreach ($companies as $company)
        <option value="{{$company->id}}"{{$company->id == $customer->company_id ? 'selected' : ''}}>{{$company->name}}</option> 
    @endforeach
    </select>        
</div>

<div class="form-group d-flex flex-column">
    <label for="image">Avatar</label>
    <input type="file" name="image" class="py-2">
    <div>{{$errors->first('image') }}</div>
</div>

<!-- avoid cross-site request forgery attack -->
@csrf