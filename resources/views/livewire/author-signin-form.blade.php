<div>
    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
    @endif
    <form action="{{ route('author.signin') }}" class="card card-md" method="Post" autocomplete="off" novalidate="" wire:submit.prevent="SigninHandler()">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" placeholder="Enter name" wire:model="name">
              @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" placeholder="Enter email" wire:model="email">
              @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input type="tel" class="form-control" placeholder="Enter phone number" wire:model="phone">
              @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="Password" autocomplete="off" wire:model="password">
        

              </div>
              @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
          </div>
        </form>
</div>
