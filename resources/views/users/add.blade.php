<x-layout title="Create User">

    <h2>Add a new user</h2>
    <form 
        action="/add-user"
        method="post"
    >
        @csrf

        <fieldset>
            <label>Personal Details</label>
            <input 
                type="text"
                name="name"
                placeholder="Full name"
                required
            />
        </fieldset>

        <fieldset>
            <label>Work Details</label>
            <input
                type="text"
                name="company"
                placeholder="Company name"
            />
            <input
                type="text"
                name="role"
                placeholder="Job title"
            />
            <input
                type="number"
                name="rate"
                min="0"
                step="1"
                placeholder="Hourly rate"
                required
            />
            <select 
                name="rate_currency"
                placeholder="Which currency?"    
            >
                @foreach( $currencies as $currency )
                    <option value="{{$currency}}">
                        {{$currency}}
                    </option>
                @endforeach
            </select>

        </fieldset>

        <div class="submitContainer">
            <button type="submit">
                Add
            </button>
        </div>

    </form>

</x-layout>