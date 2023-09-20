
<div class="row mx-auto">
    <div class="form-group mb-3">
        <label class="col-md-12" for="email">
            <span>Email</span>
            <input class="form-control" type="text" name="email" id="email" >
            <br>
            @error('email')
            <small>{{ $message }}</small>
        @enderror
        </label>
    </div>
    
   

    <div class="form-group mb-3">
        <label class="col-md-12" for="password">
            <span >Contraseña</span>
            <input class="form-control" type="password" type="text" name="password" id="password" >
            <br>
            @error('password')
            <small >{{ $message }}</small>
        @enderror
        </label>
    </div>
   
    <div class="form-group mb-3">
    <label class="col-md-12"  for="remember">
        <input type="checkbox" name="remember" id="remember" >

        <span>Recordar?</span>
    </label>
    </div>

</div>
